<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use UploadFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.settings.settings');
    }


    public function websiteColors(Request $request)
    {
        return $this->updateSettings($request);
    }

    public function logo(Request $request)
    {
        $path = 'images/logo/';

        $image = $this->setFileKey('logo')->uploadImage($request, "public/$path");

        $setting = Setting::where('name', 'logo');

        if($setting == null || !is_string($image)) {
            return response()->json([
                'errors' => $image
            ], 415);
        }

        $setting->update(['content' => "storage/$path" . $image]);

        return response()->json([
            'image' => $image,
            'path' => $path
        ]);
    }

    public function icon(Request $request)
    {
        $path = 'images/logo/icon/';

        $image = $this->setFileKey('icon')->uploadIco($request, "public/$path");

        $setting = Setting::where('name', 'ico');

        // return response()->json([
        //     'errors' => $setting->first()
        // ]);

        if($setting == null || !is_string($image)) {
            return response()->json([
                'errors' => $image
            ], 415);
        }

        $setting->update(['content' => "storage/$path" . $image]);

        return response()->json([
            'image' => $image,
            'path' => $path
        ]);
    }

    public function seo(Request $request)
    {
        return $this->updateSettings($request);
    }

    public function socialMedia(Request $request)
    {
        return $this->updateSettings($request);
    }

    public function socialMediaButtonColor(Request $request)
    {
        return $this->updateSettings($request);
    }

    public function jobButtonColor(Request $request)
    {
        return $this->updateSettings($request);
    }

    public function contact(Request $request)
    {
        return $this->updateSettings($request);
    }

    public function pages(Request $request)
    {
        return $this->updateSettings($request);
    }

    public function registerThroughAwamir(Request $request)
    {
        $data = $request->get('register_through_awamir');

        $setting = Setting::where('name', '=', 'register_through_awamir')->first();

        if($setting != null) {
            $setting->content = json_encode($data);
            $setting->save();
        }

        return redirect()->route('settings.index')->with("success", 'تم تحديث الاعدادات بنجاح');
    }

    private function updateSettings(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $setting = Setting::where('name', '=', $key)->first();

            if($setting == null) {
                continue;
            }
            $setting->content = $value;
            $setting->save();
        }

        return redirect()->route('settings.index')->with("success", 'تم تحديث الاعدادات بنجاح');
    }

}
