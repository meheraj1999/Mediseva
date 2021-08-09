<?php
namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalRequest;
use App\Models\Partner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $partnerData = Partner::orderBy('id', 'desc')->get();

        return view('back-views.Partner.index', compact('partnerData'));

    }

    public function create()
    {
        return view('back-views.Partner.create');
    }

    public function store(Request $request)
    {

        $Partner = new Partner();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Partner/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
       $Partner->status=1;
        $Partner->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('partner.home')
            ->with('success', 'Partner created successfully.');
    }
    public function status($id)
    {
        $partner = Partner::findOrFail($id);
        if ($partner->status == 0) {
            $partner->status = 1;
        } else {
            $partner->status = 0;
        }
        $partner->save();
        Toastr::success('Status Changed Successfully', 'Done');
        return redirect()->back();
    }
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('back-views.Partner.edit', compact('partner'));
    }
    public function update(Request $request, $id)
    {
        $data = Partner::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Partner/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('partner.home');
    }
    public function destroy($id)
    {

        $partner = Partner::findOrFail($id);

        $partner->delete();

        return response()->json();
    }

}
