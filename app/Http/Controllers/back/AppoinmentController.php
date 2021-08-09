<?php
namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppoinmentRequest;
use App\Models\Appoinment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AppoinmentController extends Controller
{
    public function index()
    {
        $appoinmentdata = Appoinment::orderBy('id', 'desc')->get();

        return view('back-views.Appoinment.index', compact('appoinmentdata'));

    }

    public function create()
    {
        return view('back-views.Depertment.create');
    }

    public function store(DepertmentRequest $request)
    {

        $Depertment = new Depertment();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Depertment/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $Depertment->status=1;
        $Depertment->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('depertment.home')
            ->with('success', 'Depertment created successfully.');
    }
    public function status($id)
    {
        $depertment = Depertment::findOrFail($id);
        if ($depertment->status == 0) {
            $depertment->status = 1;
        } else {
            $depertment->status = 0;
        }
        $depertment->save();
        Toastr::success('Status Changed Successfully', 'Done');
        return redirect()->back();
    }

    public function show($id)
    {
        $data = Appoinment::findOrFail($id);
        return view('back-views.Appoinment.view',compact('data'));
    }


    public function edit($id)
    {
        $depertment = Depertment::findOrFail($id);
        return view('back-views.Depertment.edit', compact('depertment'));
    }
    public function update(Request $request, $id)
    {
        $data = Depertment::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Depertment/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('depertment.home');
    }
    public function destroy($id)
    {

        $Depertment = Depertment::findOrFail($id);

        $Depertment->delete();

        return response()->json();
    }

}

