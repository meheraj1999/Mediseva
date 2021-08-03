<?php
namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicePostRequest;
use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $ServiceData = Service::orderBy('id', 'desc')->get();

        return view('back-views.Service.index', compact('ServiceData'));

    }

    public function create()
    {
        return view('back-views.Service.create');
    }

    public function store(ServicePostRequest $request)
    {

        $Service = new Service();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Service/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $Service->status=1;
        $Service->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('service.home')
            ->with('success', 'Service created successfully.');
    }
    public function status($id)
    {
        $ourService = Service::findOrFail($id);
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
        $Service = Service::findOrFail($id);
        return view('back-views.Service.edit', compact('Service'));
    }
    public function update(Request $request, $id)
    {
        $data = Service::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/Service/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('service.home');
    }
    public function destroy($id)
    {

        $Service = Service::findOrFail($id);

        $Service->delete();

        return response()->json();
    }

}
