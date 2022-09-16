<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Viewer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $popularJobs = Post::orderBy('views')->paginate(7);

        $latestJobs = Post::latest()->paginate(7);

        $builder = Post::get();

        $jobs = $builder->count();

        $allViews = $builder->sum('views');

        $countries = Country::count();

        $cities = City::count();

        $subscribers = Subscriber::count();

        $jobViewers = Viewer::all();

        return view('pages.admin.dashboard', compact(
            'popularJobs', 'countries', 'cities', 'subscribers', 'jobs',
            'latestJobs', 'allViews', 'jobViewers'
        ));
    }
}
