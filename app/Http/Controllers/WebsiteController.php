<?php

namespace App\Http\Controllers;

use App\Events\message;
use App\Mail\Sendmessage;
use Vonage\Client;
use Dompdf\Options;
use App\Models\User;
use App\Models\Video;
use App\Models\Course;
use App\Models\Category;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\NewPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Vonage\Client\Credentials\Basic;
use \Mpdf\Mpdf;
class WebsiteController extends Controller
{
   public function index()
   {
    $Courses=Course::latest()->take(3)->get();
    $Course=Course::latest()->get();
    $Category =Category::latest()->get();
    return view('Website/index',compact('Category','Courses','Course'));
   }

    public function Category($sluge)
    {
        $Category=Category::where('sluge',$sluge)->first();
        $Courses=Course::where('category_id',$Category->id)->Paginate(3);
        return view('Website/Courses',compact('Category','Courses'));
    }
    public function About()
    {
        return view('Website/About');
    }
    public function Courses()
    {

        $Category='All Courses';
        $Courses=Course::latest()->Paginate(3);
        return view('Website/Courses')->with('Courses',$Courses)
        ->with('Category',$Category);
    }

    public function Course_sengel(Course $Course)
    {

        $Course=$Course;
        $Category=Category::findorfail($Course->category_id);
        $Courses=Course::where('category_id',$Category->id)->where('id','<>',$Course->id)->get();
        return view('Website/Course-sengel')->with('Course',$Course)->with('Courses',$Courses)->with('Category',$Category);
        ;
    }
public function Buy_Course(Course $Course)
{


    $price=$Course->price;
    $descount= $Course->descount;
    $total=$price-($descount/100 *$price);
    $url = "https://eu-test.oppwa.com/v1/checkouts";
	$data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                "&amount=".$total.
                "&currency=EUR" .
                "&paymentType=DB";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	   $responseData=json_decode($responseData,true);
        $checkoutId= $responseData['id'] ;

    return view('Website/Buy_Course')->with('checkoutId',$checkoutId)->with('Course',$Course);
}

public function Buy_course_thanks(request $request, $id)
{


    $path=$request->resourcePath;
    $url = "https://eu-test.oppwa.com".$path;
	$url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	$responseData =json_decode($responseData,true);
  $varefication =[
'000.000.000',
'000.000.100',
'000.100.105',
'000.100.106',
'000.100.110',
'000.100.111',
'000.100.112',
'000.300.000',
  ];
  $code=$responseData['result']['code'];

  if(in_array($code,$varefication)){
    DB::table('_Course_user')->insert([
    'user_id'=>Auth::user()->id,
    'course_id'=>$id
    ]);
$course=Course::findorfail($id);

    // $basic  = new Basic("7d03ea96", "iy6xr8DJcyrXIliV");
    // $client = new Client($basic);

    // $response = $client->sms()->send(
    //     new \Vonage\SMS\Message\SMS("from",'to', 'regester in course '.$course->En_Name .' success')
    // );

    // $message = $response->current();

    // if ($message->getStatus() == 0) {
    //     echo "The message was sent successfully\n";
    // } else {
    //     echo "The message failed with status: " . $message->getStatus() . "\n";
    // }

return redirect()->route('Website.Videos_Course',$course);


}else{
    return "payment failed";
}






}


public function My_Courses()
{
    $Category='All Courses';
    $Courses_user =DB::table('_course_user')->where('user_id',Auth::id())->pluck('course_id');
   $Courses= Course::whereIn('id',$Courses_user)->Paginate(3);

    return view('Website/Courses')->with('Courses',$Courses)
    ->with('Category',$Category);


}

public function Videos_Course(Course $Course)
{

    $user_Videos =DB::table('user_video')->where('user_id',Auth::id())->where('Course_id',$Course->id)->pluck('Video_id')->toArray();
   return view('Website.Videos_Course')->with('Course',$Course)->with('user_Videos',$user_Videos);
}

public function Video_sengel(Video $Video)
{

return view('Website.Video_sengel')->with('Video',$Video);




}

public function Video_Show($Video_id,$Course_id,$Complete=2)
{
    $user_Videos =DB::table('user_video')->where('user_id',Auth::id())->where('Course_id',$Course_id)->pluck('Video_id')->toArray();

    if(!in_array($Video_id,$user_Videos)){
   DB::table('user_video')->insert([
    'user_id'=>Auth::id(),
    'video_id'=>$Video_id,
    'Course_id'=>$Course_id,
   ]);
}
   $next_Video=Video::where('id','>',$Video_id)->where('course_id',$Course_id)->first();
   if($Complete==2){
   return redirect()->route('Website.Video_sengel',$next_Video);
}else{

    return redirect()->route('Website.Videos_Course',$next_Video->Course);

}


}

public function Course_Certificate(Course $Course)
{

    $Video=Video::where('course_id',$Course->id)->get();

return view('Website.Certificate')->with('Course',$Course)->with('Video',$Video)->with('user',Auth::user());
}


public function pdf(Course $Course)
{
    $user=Auth::user();
 foreach($Course->video as $key=>$item){
$time[$key]=$item->time;

 }
$sum_time=array_sum($time);
$qrcode="$user->name has successfully .$Course->L_name
completed {{$sum_time}} contact video in Education Center";
    $html=view('Website/Certificate',compact('Course','user','sum_time','qrcode'))->render();

    $mpdf = new Mpdf(['orientation' => 'L',
    'margin_top'=>0 ,
    'margin_right'=>0,
    'margin_left'=>0,
    'margin_bottom'=>0,
    'margin_header'=>0,
    'margin_footer'=>0,
    'frutiger' => [
        'R' => 'Frutiger-Normal.ttf',
        'I' => 'FrutigerObl-Normal.ttf',
        'useOTL' => 0xFF,
        'useKashida' => 75,
    ],
    'default_font' => 'frutiger']);

    $mpdf->WriteHTML($html);
$namepdf='Certificate'.date('y-m-d').''.time().''.rand('9999','9999999').Str::random('7').'.pdf';
        Mail::to($user->email)->send(new Sendmessage);

    $mpdf->Output('Certificats/'.$namepdf ,'F');
    return view('Website.showCertificate')->with('name',$namepdf);
}

    public function Contact()
    {

        return view('Website/Contact');
    }
    public function Login()
    {
        return view('Website/Login');
    }

    public function Api()
    {
        return view('test2');
    }
}


