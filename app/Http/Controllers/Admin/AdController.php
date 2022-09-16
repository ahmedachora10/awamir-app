<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::latest()->get();
        return view('pages.admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {
        Ad::create($request->validated());

        return redirect()->route('ads.index')->with('success', 'تم اضافة الاعلان بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('pages.admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdRequest  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $request->validated();

        $ad->name = $request->input('name');
        $ad->content = $request->input('content');
        if($request->exists('status')) {
            $ad->status = $request->input('status');
        } else {
            $ad->status = 1;
        }

        $ad->save();

        return redirect()->route('ads.index')->with('success', 'تم تحديث الاعلان بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'تم حذف الاعلان بنجاح');
    }
}
