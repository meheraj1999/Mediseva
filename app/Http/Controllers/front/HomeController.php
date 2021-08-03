<?php
namespace app\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Service;
use App\Models\Depertment;
use App\Models\Member;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // $about_us = Setting::where('type', 'about_us')->first();
        // $our_vision = Setting::where('type', 'our_vision')->first();

        // $limit = substr($about_us['value'], 0, 5000);
        $doctorData = Doctor::where('status', 1)->orderBy('name','asc')->limit(3)->get();
        $hospitalData = Hospital::where('status', 1)->orderBy('name','asc')->limit(4)->get();
        $depertmentData = Depertment::where('status', 1)->orderBy('name','asc')->limit(6)->get();
        
        return view('front-views.homePage', compact('doctorData','hospitalData','depertmentData'));
      //  return view('front-views.homePage'), [
        //     'limit'      => $limit,

        //     'our_vision' => $our_vision,

        // ]);
    }

    public function doctor()
     {
        $doctorData = Doctor::where('status', 1)->orderBy('name','asc')->get();
        return view('front-views.doctor', compact('doctorData'));
     }

     public function hospital()
     {
        $hospitalData = Hospital::where('status', 1)->orderBy('name','asc')->get();
        return view('front-views.hospital', compact('hospitalData'));
     }

     public function service()
     {
        $serviceData = Service::where('status', 1)->orderBy('title','asc')->get();
        return view('front-views.Service', compact('serviceData'));
     }
    
    public function socialActivity()
    {
        return view('front-views.socialActivite');
    }
    public function notice()
    {
        return view('front-views.notice');
    }
    public function member($type)
    {
        $members = Member::with(['details'])->where('status', 1)->where('type', $type)->orderBy('priority', 'asc')->get();
        // $details = MemberDetails::where('member_id', $id)->get();

        return view('front-views.ECmemberList', compact('members'));

    }

    public function allPdf()
    {
        return view('front-views.pdfDownload');
    }

    public function photoGallery()
    {
        return view('front-views.photoGallery');
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'message' => 'required',
        ], [
            'name.required'    => 'Name is Empty!',
            'email.required'   => ' email is Empty!',
            'message.required' => 'Message is Empty!',

        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;

        $contact->messages = $request->message;
        $contact->save();

        return response()->json(['success' => 'Messages Send Successfully!!']);

    }
    public function contactView()
    {
        return view('front-views.contactPage');
    }
    public function aboutUs()
    {
        $about_us = Setting::where('type', 'about_us')->first();
        return view('front-views.aboutUs', [
            'about_us' => $about_us,
        ]);

    }
}
