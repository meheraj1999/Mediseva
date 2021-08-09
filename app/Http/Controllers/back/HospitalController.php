<?php
namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalRequest;
use App\Models\Hospital;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitalData = Hospital::orderBy('id', 'desc')->get();

        return view('back-views.Hospital.index', compact('hospitalData'));

    }

    public function create()
    {
        return view('back-views.Hospital.create');
    }

    public function store(HospitalRequest $request)
    {

        $Hospital = new Hospital();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Hospital/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
       $Hospital->status=1;
        $Hospital->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('hospital.home')
            ->with('success', 'Hospital created successfully.');
    }
    public function status($id)
    {
        $hospital = Hospital::findOrFail($id);
        if ($hospital->status == 0) {
            $hospital->status = 1;
        } else {
            $hospital->status = 0;
        }
        $hospital->save();
        Toastr::success('Status Changed Successfully', 'Done');
        return redirect()->back();
    }
    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('back-views.Hospital.edit', compact('hospital'));
    }
    public function update(Request $request, $id)
    {
        $data = Hospital::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Hospital/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('hospital.home');
    }
    public function destroy($id)
    {

        $Hospital = Hospital::findOrFail($id);

        $Hospital->delete();

        return response()->json();
    }

}
