<?php

namespace App\Http\Controllers\back;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialActivitesRequest;
use App\Models\SocialActivites;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SocialActivitesController extends Controller
{
    public function index()
    {
        $SliderData = SocialActivites::orderBy('id', 'desc')->paginate(500);
        return view('back-views.socialActivite.index', compact('SliderData'));

    }

    public function create()
    {
        return view('back-views.socialActivite.create');
    }

    public function store(SocialActivitesRequest $request)
    {

        $socialActivite = new SocialActivites();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/socialActivite/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $socialActivite->status = 1;

        $socialActivite->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('socialActivite.home')
            ->with('success', 'SocialActivites created successfully.');
    }
    public function status($id)
    {
        $ourService = SocialActivites::findOrFail($id);
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
        $socialActivite = SocialActivites::findOrFail($id);
        return view('back-views.socialActivite.edit', compact('socialActivite'));
    }
    public function update(Request $request, $id)
    {
        $data = SocialActivites::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            Helper::delete($data->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/socialActivite/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('socialActivite.home');
    }
    public function destroy($id)
    {

        $socialActivite = SocialActivites::findOrFail($id);
        Helper::delete($socialActivite->image);
        $socialActivite->delete();

        return response()->json();
    }
}
