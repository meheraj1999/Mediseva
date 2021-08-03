<?php
namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index()
    {
        $doctorData = Doctor::orderBy('id', 'desc')->get();

        return view('back-views.Doctor.index', compact('doctorData'));

    }

    public function create()
    {
        return view('back-views.Doctor.create');
    }

    public function store(DoctorRequest $request)
    {

        $Doctor = new Doctor();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Doctor/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }

        $Doctor->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('doctor.home')
            ->with('success', 'Doctor created successfully.');
    }
    public function status($id)
    {
        $ourService = Doctor::findOrFail($id);
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
        $doctor = Doctor::findOrFail($id);
        return view('back-views.Doctor.edit', compact('doctor'));
    }
    public function update(Request $request, $id)
    {
        $data = Doctor::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Doctor/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('doctor.home');
    }
    public function destroy($id)
    {

        $Doctor = Doctor::findOrFail($id);

        $Doctor->delete();

        return response()->json();
    }

}
