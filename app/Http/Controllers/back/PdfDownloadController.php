<?php

namespace App\Http\Controllers\back;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoGalleryRequest;
use App\Models\PdfDownload;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PdfDownloadController extends Controller
{
    public function index()
    {
        $pdfData = PdfDownload::orderBy('id', 'desc')->paginate(500);
        return view('back-views.pdf.index', compact('pdfData'));

    }

    public function create()
    {
        return view('back-views.pdf.create');
    }

    public function store(PhotoGalleryRequest $request)
    {

        $pdf = new PdfDownload();
        $requested_data = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/pdf/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $pdf->status = 1;

        $pdf->fill($requested_data)->save();
        Toastr::success('Save Successfully');

        return redirect()->route('pdf.home')
            ->with('success', 'PdfDownload created successfully.');
    }
    public function show($id)
    {
        $file = PdfDownload::find($id);
        $publicPath = $file->image;

        return response()->file($publicPath);
    }
    public function status($id)
    {
        $ourService = PdfDownload::findOrFail($id);
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
        $pdf = PdfDownload::findOrFail($id);
        return view('back-views.pdf.edit', compact('pdf'));
    }
    public function update(Request $request, $id)
    {
        $data = PdfDownload::findOrFail($id);
        $formData = $request->all();

        if ($request->hasFile('image')) {
            Helper::delete($data->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "assets/back-end/images/pdf/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }

        $data->fill($formData)->save();
        Toastr::success('update Successfully');
        return redirect()->route('pdf.home');
    }
    public function destroy($id)
    {

        $pdf = PdfDownload::findOrFail($id);

        Helper::delete($pdf->image);

        $pdf->delete();

        return response()->json();
    }
}
