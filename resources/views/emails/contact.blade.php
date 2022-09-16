<!DOCTYPE html>
<html>
    <head>
        <title>note</title>
    </head>
    <body style="background-color: rgba(206, 206, 206, 0.3);direction: rtl;border-radius: 10px;padding:30px 5px ;">
        <center>
            <img  src="{{ asset('images/logo_mail.png') }}" style="width:80%;max-width: 250px;margin : 10px 0" />
         <div style="width: 100%;max-width:500px ; ">
        <div style="width: 95%;padding: 6px 4px;color: rgb(255, 255, 255);background-color: rgb(65, 225, 137);
        border-radius: 10px ;margin: 10px 0;
        ">
            <h3>اشعار</h3>
        </div>
        <div  style="padding: 20px 4px;width:95%; background-color: white; margin: 10px 0;border-radius: 10px;">
            <p style="text-align: right;font-size: 15px;line-height: 40px;">
                {!!  nl2br(e($content)) !!}
            </p>
        </div>

     </div>
     <div >
     </div>
    </center>


    </body>
</html>
