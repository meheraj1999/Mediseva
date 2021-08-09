<?php
namespace app\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Appoinment;
use App\Models\Service;
use App\Models\Depertment;
use App\Models\Partner;
use Brian2694\Toastr\Facades\Toastr;
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
        $hospitalData = Hospital::where('status', 1)->orderBy('id','desc')->limit(4)->get();
        $depertmentData = Depertment::where('status', 1)->orderBy('name','asc')->limit(6)->get();
        $partnerData = Partner::where('status', 1)->get();


        return view('front-views.homePage', compact('doctorData','hospitalData','depertmentData','partnerData'));
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

     public function details( $id)
     {
    
        $data = Hospital::findOrFail($id);
        return view('front-views.details', compact('data'));
     }

     public function doc_details( $id)
     {
    
        $data = Doctor::findOrFail($id);
        return view('front-views.doctor_details', compact('data'));
     }

     public function create( )
     {
    
        return view('front-views.Appoinment');
     }

     public function service_details( $id)
     {
    
        $data = Service::findOrFail($id);
        return view('front-views.service_details', compact('data'));
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

    public function appoinment(Request $request)
    {
        $appoinment = new Appoinment();
        $requested_data = $request->all();
    
        $appoinment->status=1;
        $appoinment->fill($requested_data)->save();
        Toastr::success('appoinment booked Successfully');

        return redirect()->back();
          
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
