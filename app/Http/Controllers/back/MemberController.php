<?php

namespace App\Http\Controllers\back;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\MemberDetails;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index($status)
    {

        $members = Member::with(['details'])->orderBy('id', 'desc')->where(['type' => $status])->get();

        return view('back-views.members.index', compact('members'));

    }

    public function create()
    {

        return view('back-views.members.create');
    }

    public function store(MemberRequest $request)
    {

        $members = new Member();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/members/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }

        $members->status = 1;

        $members->fill($requested_data)->save();

        if ($request->type == 2 || $request->type == 3 || $request->type == 1) {

            $member = new MemberDetails();
            $member->member_id = $members->id;
            $member->father = $request->father;
            $member->mother = $request->mother;
            $member->email = $request->email;
            $member->presentAddress = $request->presentAddress;
            $member->presentAddress = $request->address;

            $member->permanentAddress = $request->permanentAddress;
            $member->phone = $request->phone;
            $member->period = $request->period;
            
                if ($request->hasFile('sec_image')) {
                    
                    $extension = $request->file('sec_image')->getClientOriginalExtension();
                    $name = 'sec_image' . Str::random(5) . '.' . $extension;
                    $path = "assets/back-end/images/sec_image/";
                    $request->file('sec_image')->move($path, $name);
                    $formData = $path . $name;
                    $formData;

                 }
                 $member->sec_image = $formData;
                
           

            

            $member->save();

        }
        Toastr::success('Save Successfully');

        return redirect()->route('members.home', [0])
            ->with('success', 'Member created successfully.');
    }
    public function status($id)
    {
        $ourService = Member::findOrFail($id);
        if ($ourService->status == 0) {
            $ourService->status = 1;
        } else {
            $ourService->status = 0;
        }
        $ourService->save();
        Toastr::success('Status Changed Successfully', 'Done');
        return redirect()->back();
    }

    public function edit($id)
    {
        $members = Member::findOrFail($id);
        $details = MemberDetails::where('member_id', $id)->first();

        return view('back-views.members.edit', compact('members', 'details'));
    }

    public function update(Request $request, $id)
    {

        $data = Member::findOrFail($id);
        $formData = $request->all();
      

        if ($request->hasFile('image')) {
            Helper::delete($data->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/members/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        if ($request->hasFile('sec_image')) {
            Helper::delete($data->details->sec_image);
            $extension = $request->file('sec_image')->getClientOriginalExtension();
            $name = 'sec_image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/sec_image/";
            $request->file('sec_image')->move($path, $name);
            $secimg = $path . $name;
            
            $data->details->sec_image = $secimg;
        }
     
                
        $data->fill($formData)->save();
         if($data->details){
            $data->details->update($formData);

         }
        

        Toastr::success('update Successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {

        $members = Member::findOrFail($id);
        Helper::delete($members->image);
        $members->delete();

        return response()->json();
    }
}
