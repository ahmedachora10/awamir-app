<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function store(Request $request)
    {
        Support::create([
            'content' => $request->content,
            'time' => $request->time,
        ]);

        return redirect()->back()->with('success', 'تم اضافة العنصر بنجاح');
    }

    public function update(Request $request, Support $support)
    {
        $support->content = $request->content;
        $support->time = $request->time;

        $support->save();

        return redirect()->back()->with('success', 'تم تحديث العنصر بنجاح');
    }
}
