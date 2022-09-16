<!DOCTYPE html>
<html>
    <head>
        <title>Jobs Email</title>
    </head>
    <body style="background-color: rgba(206, 206, 206, 0.3);direction: rtl;border-radius: 10px;padding:30px 5px ;">
        <center>
     <img  src="{{asset('images/logo_mail.png')}}" style="width:80%;max>

         <div style="width: 100%;max-width:500px ; ">
        <div style="width: 95%;padding: 6px 4px;color: rgb(255, 255, 255);background-color: rgb(65, 225, 137);
        border-radius: 10px ;margin: 10px 0;
        ">
            <h3>آخر الوظائف</h3>
        </div>

        @foreach ($jobs as $job)
        <a href="{{ route('web.jobs.show', $job) }}"><div style='width: 95%;max-width: 500px;background-color: white;border-radius: 10px;display: inline-table;
        margin: 20px 0;border: 1px solid rgba(192, 192, 192, 0.5);box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;' s>
                <div style='width: 25%;padding: 5px;position: relative;display: inline-table'>
                    <div class="con">
                      <img style='width: 50px;border-radius: 100%;height: 50px;margin-bottom: 8px;border: 2pt solid rgb(94, 194, 144);' src="{{ asset('storage/images/jobs/' . $job->image) }}" >
                    </div>
                </div>
                <div style='width: 72%;padding: 5px 8px;display: inline-table'>
                    <h3 style='font-size: 18px;color: royalblue;text-align: right !important;'>{{$job->name}} </h3>
                    <div style='font-size: 15px;text-align: right;color: rgb(94, 194, 144);'>{{$job->company}}</div>
                    <p style='font-size: 14px;margin: 6px 0;text-align: right !important;color: black;'>{{Str::limit(Str::replace('&nbsp;', ' ', strip_tags($job->description)), 65, ' ...');}}</p>
                </div>
                </div></a>
        @endforeach
     </div>
     <div >
     </div>
    </center>


    </body>
</html>
