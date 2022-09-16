<?php

namespace App\Http\Controllers;

use App\Models\Viewer;
use App\Http\Requests\StoreViewerRequest;
use App\Http\Requests\UpdateViewerRequest;

class ViewerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreViewerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreViewerRequest $request)
    {
        Viewer::create($request->validated());
        return true;
    }

}
