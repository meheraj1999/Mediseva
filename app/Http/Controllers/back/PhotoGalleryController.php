<?php
namespace App\Http\Controllers\back;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoGalleryRequest;
use App\Models\PhotoGallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photoData = PhotoGallery::orderBy('id', 'desc')->paginate(500);
        return view('back-views.photo.index', compact('photoData'));

    }

    public function create()
    {
        return view('back-views.photo.create');
    }

    public function store(PhotoGalleryRequest $request)
    {

        $photo = new PhotoGallery();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/photo/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $photo->status = 1;

        $photo->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('photo.home')
            ->with('success', 'PhotoGallery created successfully.');
    }
    public function status($id)
    {
        $ourService = PhotoGallery::findOrFail($id);
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
        $photo = PhotoGallery::findOrFail($id);
        return view('back-views.photo.edit', compact('photo'));
    }
    public function update(Request $request, $id)
    {
        $data = PhotoGallery::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            Helper::delete($data->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/photo/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('photo.home');
    }
    public function destroy($id)
    {

        $photo = PhotoGallery::findOrFail($id);

        Helper::delete($photo->image);

        $photo->delete();

        return response()->json();
    }

}
