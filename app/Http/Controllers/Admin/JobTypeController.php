<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use App\Http\Requests\StoreJobTypeRequest;
use App\Http\Requests\UpdateJobTypeRequest;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = JobType::latest()->get();
        return view('pages.admin.job-types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.job-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobTypeRequest $request)
    {
        JobType::create($request->validated());

        return redirect()->route('job-types.index')->with('success', 'تم اضافة العنصر بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function edit(JobType $jobType)
    {
        return view('pages.admin.job-types.edit', compact('jobType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobTypeRequest  $request
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobTypeRequest $request, JobType $jobType)
    {
        $request->validated();

        $jobType->name = $request->input('name');
        $jobType->save();

        return redirect()->route('job-types.index')->with('success', 'تم تحديث العنصر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobType  $jobType
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobType $jobType)
    {
        // $posts = $jobType->posts();
        // if($posts->count() > 0) {
        //     $posts->delete();
        // }
        // foreach ($posts as $post) {
        //     $post->delete();
        // }

        $jobType->delete();
        return redirect()->route('job-types.index')->with('success', 'تم حذف العنصر بنجاح');
    }
}