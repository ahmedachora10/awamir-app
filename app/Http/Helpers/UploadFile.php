<?php

namespace App\Http\Helpers;

use App\Http\Requests\StoreVideoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait UploadFile {

    protected string $name;

    public function setFileKey(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function uploadImage (Request $request, string $folder)
    {

        $validator = Validator::make($request->all(), [
            $this->name => 'required|image|mimes:jpg,jpeg,png,svg,webp'
        ]);

        // if there is error
        if ($validator->fails()) {
            return response()->json(
                $validator->errors()->all(),
                415
            );
        }

        $file = $request->file($this->name);
        $extension = $file->getClientOriginalExtension();

        $file_name = auth()->id() .'-'. substr(time() . $file->hashName(),0, 20) . '.' . $extension;

        $file->storeAs($folder, $file_name);

        return $file_name;
    }

    public function uploadIco (Request $request, string $folder)
    {

        $validator = Validator::make($request->all(), [
            $this->name => 'required'
        ]);

        // if there is error
        if ($validator->fails()) {
            return response()->json(
                $validator->errors()->all(),
                415
            );
        }

        $file = $request->file($this->name);
        $extension = $file->getClientOriginalExtension();

        $file_name = auth()->id() .'-'. substr(time() . $file->hashName(),0, 20) . '.' . $extension;

        $file->storeAs($folder, $file_name);

        return $file_name;
    }

    public function uploadVideo (Request $request, string $folder)
    {
        $validator = Validator::make($request->all(), [
            $this->name => 'required|file|mimes:mp4,mov,mp4v,mpg,m4v'
        ]);

        // if there is error
        if ($validator->fails()) {
            return response()->json(
                $validator->errors()->all(),
                415
            );
        }

        $file = $request->file($this->name);
        $extension = $file->getClientOriginalExtension();

        $file_name = auth()->id() .'-'. substr(time() . $file->hashName(),0, 20) . '.' . $extension;

        $file->storeAs($folder, $file_name);

        return $file_name;
    }

    public function uploadFile (Request $request, string $folder)
    {
        $validator = Validator::make($request->all(), [
            $this->name => 'required|file|mimes:pdf'
        ]);

        // if there is error
        if ($validator->fails()) {
            return response()->json(
                $validator->errors()->all(),
                415
            );
        }

        $file = $request->file($this->name);
        $extension = $file->getClientOriginalExtension();

        $file_name = auth()->id() .'-'. substr(time() . $file->hashName(),0, 20) . '.' . $extension;

        $file->storeAs($folder, $file_name);

        return $file_name;
    }

}
