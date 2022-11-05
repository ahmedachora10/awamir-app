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
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class HomeController extends Controller
{

    public function __construct() {

        SEOTools::setDescription(settings('site_description'));
    }

    public function index()
    {

        SEOTools::setTitle(' الرئيسية');

        $latestJobs = Post::published()->latest()->take(10)->get();

        //
        //

        $importantJobs = Post::published()
        ->where('created_at', '<', now()->subDays(2)->format('Y-m-d H:i:s'))
        ->where('created_at', '>=', now()->subDays(14)->format('Y-m-d H:i:s'))
        ->orderByDesc('views')->take(10)->get();

        $categories = Category::all();

        return view('pages.web.home', compact('latestJobs', 'importantJobs', 'categories'));
    }

    public function resumeService()
    {
        SEOTools::setTitle(' خدمة السيرة الذاتية ');
        return view('pages.web.resume');
    }

    public function about()
    {
        SEOTools::setTitle(' نبدة عنا ');
        $page = settings('about');
        return view('pages.web.static-page', compact('page'));
    }

    public function privacy()
    {
        SEOTools::setTitle(' الخصوصية ');
        $page = settings('privacy');
        return view('pages.web.static-page', compact('page'));
    }

    public function terms()
    {
        SEOTools::setTitle(' الشروط ');
        $page = settings('terms');
        return view('pages.web.static-page', compact('page'));
    }

    public function contact()
    {
        SEOTools::setTitle(' تواصل معنا ');
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