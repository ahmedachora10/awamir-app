<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ArSlug;
use App\Http\Helpers\PostStatus;
use App\Http\Helpers\UploadFile;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use UploadFile, ArSlug;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Post::with('city','country', 'category')->latest()->get();
        return view('pages.admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::all(['id', 'name']);

        $categories = Category::all();

        $jobTypes = JobType::all();

        $cities = City::all(['id', 'country_id', 'name']);

        return view('pages.admin.jobs.create', compact('countries', 'categories', 'jobTypes', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $job = Post::create(array_merge(
            [
                'slug' => $this->slug($request->input('name')),
                'tls' => time() . '_' . str()->random(4)
            ],
            $data
        ));

        $path = "tmp/images/{$request->input('image')}";
        if(Storage::exists($path)) {
            Storage::move($path, "public/images/jobs/{$job->image}");
        }

        return redirect()->route('jobs.show', [$job->id])->with('success', 'تم اضافة الوظيفة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $job)
    {
        // dd(PostStatus::PUBLISH->value);
        return view('pages.admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $job)
    {
        $job = $job->load('country', 'city', 'category', 'jobType');

        $countries = Country::all(['id', 'name']);

        $categories = Category::all();

        $jobTypes = JobType::all();

        $cities = City::all(['id', 'country_id', 'name']);

        return view('pages.admin.jobs.edit', compact('job', 'countries', 'categories', 'jobTypes', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $job)
    {

        $data = $request->validated();

        $path = "tmp/images/{$request->input('image')}";

        if($request->input('image') != $job->image) {
            if(Storage::exists("public/images/jobs/{$job->image}")) {
                Storage::delete("public/images/jobs/{$job->image}");
            }

            if(Storage::exists($path)) {
                Storage::move($path, "public/images/jobs/{$request->input('image')}");
            }
        }

        $job->update($data);

        return redirect()->route('jobs.show', $job)->with('success', 'تم تحديث الوظيفة بنجاح');
    }

    public function addKeywords(Request $request, Post $job)
    {
        $job->keywords = $request->keywords;
        $job->status = $request->status ?? PostStatus::DRAFT->value;
        $job->save();

        return redirect()->route('jobs.index')->with('success', 'تم تحديث الوظيفة بنجاح');
    }

    public function changeStatus(Request $request)
    {
        $job = Post::find($request->job);

        if($job == null) {
            return response()->json([
                'errors' => true
            ]);
        }

        $job->status = $job->status == PostStatus::PUBLISH->value ? PostStatus::DRAFT->value : PostStatus::PUBLISH->value;
        $job->save();

        return response()->json([
            'status' => $job->status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $job)
    {
        $path = "public/images/jobs/{$job->image}";

        if(Storage::exists($path)) {
            Storage::delete($path);
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'تم حذف الوظيفة بنجاح');
    }

    public function thumbnail(Request $request)
    {
        return $this->setFileKey('image')
        ->uploadImage($request, '/tmp/images/');
    }
}
