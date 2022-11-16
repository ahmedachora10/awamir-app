<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\PostStatus;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\Viewer;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        SEOTools::setTitle('كل الوظائف')
        ->setDescription(settings('site_description'))
        ->opengraph()->setUrl(route('web.jobs.index'));
        // ->addProperty('type', 'JobPosting');
        SEOTools::twitter()->setSite('@Awamirtawzif');

        $categories = Category::all();

        $cities = City::all();

        $jobs = Post::published();

        if(request()->exists('squery')) {
            $jobs->where('name', 'like', "%".request('squery')."%");
        }

        if(request()->exists('category')) {
            $jobs->where('category_id', request('category'));
        }

        $jobs = $jobs->latest()->paginate(10);

        // if(count($jobs) >= 5)  {
        //     $images = [];
        //     for ($i=0; $i < 5; $i++) {
        //         $images[] = asset('storage/images/jobs/' . $jobs[$i]->image);
        //     }

        //     SEOTools::addImages($images);
        // }

        return view('pages.web.jobs.index', compact('categories', 'cities', 'jobs'));
    }

    public function show(Post $job)
    {

        abort_if(!auth()->check() && $job->status == PostStatus::DRAFT->value, 404);

        SEOTools::setTitle($job->name)
        ->setDescription(strip_tags($job->description));
        // ->opengraph()->setUrl(route('web.jobs.show', $job))
        // ->addProperty('type', 'JobPosting');
        // SEOTools::twitter()->setSite('@Awamirtawzif');
        // SEOTools::jsonLd()->addImage($job->image);

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

    public function loadMoreJobs(Request $request)
    {
        $jobs = Post::published();

        if($request->exists('category') && !is_null($request->category)) {
            $jobs->where('category_id', $request->category);
        }

        if($request->exists('city') && !is_null($request->city)) {
            $jobs->where('city_id', $request->city);
        }

        if($request->exists('type') && !is_null($request->type) && $request->type == 'imp') {
            $jobs->whereMonth('updated_at', date('m'))
            ->whereYear('updated_at', date('Y'))
            ->orderByDesc('views');
        } else {
            $jobs = $jobs->latest();
        }

        $jobs = $jobs->paginate(8);

        return view('components.web.job-container', compact('jobs'));

    }

    public function filter(Request $request)
    {
        $jobs = Post::with('category')->published()->where('name', 'like', "%{$request->squery}%")->get();

        return response($jobs);
    }
}