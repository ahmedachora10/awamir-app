<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\AvatarGenerator;
use App\Http\Helpers\PostStatus;
use App\Mail\SendContactEmail;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\JobType;
use App\Models\Post;
use App\Models\Viewer;
use App\Rules\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class HomeController extends Controller
{

    public function index()
    {
        $latestJobs = Post::published()->where('created_at', '>=', now()->subDays(2)->format('Y-m-d H:i:s'))->latest()->take(10)->get();

        $importantJobs = Post::published()->where('created_at', '<', now()->subDays(2)->format('Y-m-d H:i:s'))
        ->where('created_at', '>=', now()->subDays(10)->format('Y-m-d H:i:s'))
        ->orderBy('views')->take(10)->get();

        $categories = Category::all();

        return view('pages.web.home', compact('latestJobs', 'importantJobs', 'categories'));
    }

    public function resumeService()
    {
        return view('pages.web.resume');
    }

    public function about()
    {
        $page = settings('about');
        return view('pages.web.static-page', compact('page'));
    }

    public function privacy()
    {
        $page = settings('privacy');
        return view('pages.web.static-page', compact('page'));
    }

    public function terms()
    {
        $page = settings('terms');
        return view('pages.web.static-page', compact('page'));
    }

    public function contact()
    {
        return view('pages.web.contact');
    }

    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => ['required', new Text],
            'lname' => ['required', new Text],
            'email' => ['required', 'email'],
            'content' => ['required', 'string'],
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all()
            ]);
        }

        $content = 'تم ارسال هذه الرسالة عن طريق نموذج التواصل
            الاسم الشخصي : '.$request->fname.'   ،
            الاسم العائلي : '.$request->lname.'  ،
            الايمايل  : '.$request->email.'  ،

            المحتوى  :
            '.$request->content;

        Mail::to(settings('email'))->send(new SendContactEmail($content));

        return response()->json([
            'status'=> 1
        ]);
    }
}