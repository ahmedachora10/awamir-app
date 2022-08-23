<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $popularJobs = Post::orderBy('views')->paginate(7);
        $countries = Country::count();

        return view('pages.admin.dashboard', compact('popularJobs', 'countries'));
    }
}
