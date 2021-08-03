<?php
namespace App\Http\Controllers\back;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderPostRequest;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $SliderData = Slider::orderBy('id', 'desc')->paginate(500);
        return view('back-views.slider.index', compact('SliderData'));

    }

    public function create()
    {
        return view('back-views.slider.create');
    }

    public function store(SliderPostRequest $request)
    {

        $slider = new Slider();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/slider/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $slider->status = 1;

        $slider->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('slider.home')
            ->with('success', 'Slider created successfully.');
    }
    public function status($id)
    {
        $ourService = Slider::findOrFail($id);
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
        $slider = Slider::findOrFail($id);
        return view('back-views.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $data = Slider::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            Helper::delete($data->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/slider/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('slider.home');
    }
    public function destroy($id)
    {

        $slider = Slider::findOrFail($id);
        Helper::delete($slider->image);
        $slider->delete();

        return response()->json();
    }

}
