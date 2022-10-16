<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\PostStatus;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\Viewer;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $cities = City::all();

        // $jobs = Post::all();

        $jobs = Post::query();

        if(request()->exists('squery')) {
            $jobs->where('name', 'like', "%".request('squery')."%");
        }

        if(request()->exists('category')) {
            $jobs->where('category_id', request('category'));
        }

        $jobs = $jobs->get();

        return view('pages.web.jobs.index', compact('categories', 'cities', 'jobs'));
    }

    public function show(Post $job)
    {

        abort_if(!auth()->check() && $job->status == PostStatus::DRAFT->value, 404);

        $viewer = Viewer::where('date',now()->format('Y-m-d'))->first();

        if(is_null($viewer)) {
            Viewer::create([
                'date' => now()->format('Y-m-d'),
                'views' => 1
            ]);
        } else {
            $viewer->increment('views');
        }

        $job->increment('views');

        $job = $job->load('city', 'country', 'category', 'jobType');

        $relatedJobs = Post::published()
        ->where('id', '<>', $job->id)
        ->where('city_id', $job->city_id)
        ->where('country_id', $job->country_id)
        ->where('category_id', $job->category_id)->latest()->paginate(4);

        return view('pages.web.jobs.show', compact('job', 'relatedJobs'));
    }

    public function loadJobs(Request $request)
    {
        $jobs = Post::published();

        if($request->exists('category') && !is_null($request->category)) {
            $jobs->where('category_id', $request->category);
        }

        if($request->exists('city') && !is_null($request->city)) {
            $jobs->where('city_id', $request->city);
        }

        if($request->exists('type') && !is_null($request->type) && $request->type == 'imp') {
            $jobs = $jobs->whereMonth('updated_at', date('m'))
            ->whereYear('updated_at', date('Y'))
            ->orderByDesc('views')->paginate(8);
        } else {
            $jobs = $jobs->orderByDesc('id')->paginate(8);
        }

        return view('components.web.job-container', compact('jobs'));

    }

    public function filter(Request $request)
    {
        $jobs = Post::with('category')->published()->where('name', 'like', "%{$request->squery}%")->get();

        return response($jobs);
    }
}
