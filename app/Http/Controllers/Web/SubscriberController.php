<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all()
            ]);
        }

        Subscriber::create(['email' => $request->email]);

        return response()->json(['status' => 1]);
    }


}
