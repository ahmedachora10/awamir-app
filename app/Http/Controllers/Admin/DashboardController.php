<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Viewer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $view = Viewer::get();

        // Daily
        $dailyViews = $view->where('date', Carbon::now()->format('Y-m-d'))->sum('views');

        // Prev Monthly
        $prveMonth = Carbon::now()->subMonths(1);
        $firstDayOfMonth = new Carbon("first day of " . $prveMonth->format('M') . " " .$prveMonth->format('y'));
        $lastDayOfMonth = new Carbon("last day of " . $prveMonth->format('M') . " " .$prveMonth->format('y'));

        $monthlyViews = $view->whereBetween('date',[$firstDayOfMonth->format('Y-m-d'), $lastDayOfMonth->format('Y-m-d')])->sum('views');

        // Prev Week
        $prevWeekViews = $view->whereBetween('date', [Carbon::now()->subWeeks(2)->format('Y-m-d'), Carbon::now()->subWeeks(1)->format('Y-m-d')])->sum('views');

        // Current Week
        $currentWeekViews = $view->whereBetween('date', [Carbon::now()->subWeek()->format('Y-m-d'), Carbon::now()->format('Y-m-d')])->sum('views');

        $popularJobs = Post::orderBy('views')->paginate(7);

        $allViews = $view->sum('views');

        $jobViewers = $view->all();

        $isAdmin = auth()->user()->hasRole('admin');

        return view('pages.admin.dashboard', compact(
            'popularJobs', 'monthlyViews', 'prevWeekViews', 'currentWeekViews', 'dailyViews', 'allViews', 'jobViewers',
            'isAdmin'
        ));
    }
}
