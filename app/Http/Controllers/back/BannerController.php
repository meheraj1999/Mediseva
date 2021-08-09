<?php

namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class BannerController extends Controller
{
     public function index()
    {
        return view('back-views.Banner');
    }

    public function bannerUpdate(Request $request, $banner)
    {

        if ($banner == 'mainBanner') {

            $mainBanner = Setting::where('type', 'mainBanner')->first();

            if (isset($mainBanner) == false) {

                DB::table('settings')->insert([
                    'type'       => 'mainBanner',
                    'value'      => 'dp.png',
                  
                    
               
                ]);
            } else {
             
                    
                    if ($request->hasFile('image')) {

                        $extension = $request->file('image')->getClientOriginalExtension();
                        $name = 'image' . Str::random(5) . '.' . $extension;
                        $path = "assets/back-end/images/Banner/";
                        $request->file('image')->move($path, $name);
                        
                          $save = $request['image'] = $path . $name;
                       
                        DB::table('settings')->where(['type' => 'mainBanner'])->update(['value' => $save]);
    
                    }
                    
                  
                  
               
            }
        } elseif ($banner == 'singleBanner') {
            $singlebanner = Setting::where('type', 'singleBanner')->first();
            if (isset($singlebanner) == false) {
                DB::table('settings')->insert([
                    'type'       => 'singleBanner',
                    'value'      => 'sb.png'
                 
                ]);
            } else {
                if ($request->hasFile('image')) {

                    $extension = $request->file('image')->getClientOriginalExtension();
                    $name = 'image' . Str::random(5) . '.' . $extension;
                    $path = "assets/back-end/images/SingleBanner/";
                      $request->file('image')->move($path, $name);
                    
                      $save = $request['image'] = $path . $name;
                   
                    DB::table('settings')->where(['type' => 'SingleBanner'])->update(['value' => $save]);

                }
            }
        } elseif ($banner == 'footerBanner') {
            $footerBanner = Setting::where('type', 'footerBanner')->first();
            if (isset($footerBanner) == false) {
                DB::table('settings')->insert([
                    'type'       => 'footerBanner',
                    'value'      => 'fb.png'
                ]);
            } else {
                if ($request->hasFile('image')) {

                    $extension = $request->file('image')->getClientOriginalExtension();
                    $name = 'image' . Str::random(5) . '.' . $extension;
                    $path = "assets/back-end/images/footerBanner/";
                      $request->file('image')->move($path, $name);
                    
                      $save = $request['image'] = $path . $name;
                   
                    DB::table('settings')->where(['type' => 'footerBanner'])->update(['value' => $save]);

                }
            }
        } elseif ($setting == 'appAddress') {
            $address = Setting::where('type', 'appAddress')->first();
            if (isset($address) == false) {
                DB::table('settings')->insert([
                    'type'       => 'appAddress',
                    'value'      => json_encode([

                        'name' => 'hjkl',

                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('settings')->where(['type' => 'appAddress'])->update([
                    'type'       => 'appAddress',
                    'value'      => json_encode([

                        'name' => $request['name'],

                    ]),
                    'updated_at' => now(),
                ]);
            }
        } elseif ($setting == 'homeVideo') {
            $homeVideo = Setting::where('type', 'homeVideo')->first();
            if (isset($homeVideo) == false) {
                DB::table('settings')->insert([

                    'value' => 'myvideo.mp4',

                ]);
            } else {

                if ($request->hasFile('image')) {

                    $extension = $request->file('image')->getClientOriginalExtension();
                    $name = 'image' . Str::random(5) . '.' . $extension;
                    $path = "assets/back-end/images/video/";
                    $request->file('image')->move($path, $name);
                    $save = $request['image'] = $path . $name;
                    DB::table('settings')->where(['type' => 'homeVideo'])->update(['value' => $save]);

                }
                // if ($request->hasFile('image')) {
                //     $extension = $request->file('image')->getClientOriginalExtension();
                //     $name = 'image' . Str::random(5) . '.' . $extension;
                //     $path = "assets/back-end/images/photo/";
                //     $request->file('image')->move($path, $name);
                //     return $requested_data['image'] = $path . $name;

                // }

            }

        }
        Toastr::success(' Updated ');

        return back();

    }
}
