<?php
namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function about_us()
    {
        $about_us = Setting::where('type', 'about_us')->first();
        return view('back-views.about-us', [
            'about_us' => $about_us,
        ]);

    }
    public function video()
    {
        return view('back-views.video');
    }
    public function about_usUpdate(Request $data)
    {

        Setting::where('type', 'about_us')->update(['value' => $data->about_us]);
        Toastr::success('About Us updated successfully!');
        return back();
    }
    public function our_vision()
    {
        $our_vision = Setting::where('type', 'our_vision')->first();
        return view('back-views.our-vision', [
            'our_vision' => $our_vision,
        ]);

    }

    public function our_VisionUpdate(Request $data)
    {

        Setting::where('type', 'our_vision')->update(['value' => $data->our_vision]);
        Toastr::success('Notice  updated successfully!');
        return back();
    }
    public function socialView()
    {

        return view('back-views.social');

    }
    public function socialUpdate(Request $request, $name)
    {
        if ($name == 'social') {
            $social = Setting::where('type', 'social')->first();
            if (isset($social) == false) {
                DB::table('settings')->insert([
                    'type'       => 'social',
                    'value'      => json_encode([

                        'facebook'  => 'https://www.facebook.com/',
                        'whatsapp'  => 'https://www.whatsapp.com/',
                        'instagram' => 'https://www.instagram.com/',
                        'linkdin'   => 'https://www.linkdin.com/',
                        'twiter'    => 'https://www.twiter.com/',
                        'youtube'   => 'https://www.youtube.com/',

                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('settings')->where(['type' => 'social'])->update([
                    'type'       => 'social',
                    'value'      => json_encode([

                        'facebook'  => $request['facebook'],
                        'whatsapp'  => $request['whatsapp'],
                        'instagram' => $request['instagram'],
                        'linkdin'   => $request['linkdin'],
                        'twiter'    => $request['twiter'],
                        'youtube'   => $request['youtube'],

                    ]),
                    'updated_at' => now(),
                ]);
            }
        }
        Toastr::success(' Social Link Updated successfully');

        return back();
    }
    public function index()
    {

        return view('back-views.pray.index');
    }

    public function setting()
    {
        return view('back-views.setting');
    }
    public function appUpdate(Request $request, $setting)
    {

        if ($setting == 'appName') {

            $appName = Setting::where('type', 'appName')->first();

            if (isset($appName) == false) {

                DB::table('settings')->insert([
                    'type'       => 'appName',
                    'value'      => json_encode([

                        'name' => 'lkjkl',

                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('settings')->where(['type' => 'appName'])->update([
                    'type'       => 'appName',
                    'value'      => json_encode([

                        'name' => $request['name'],

                    ]),
                    'updated_at' => now(),
                ]);
            }
        } elseif ($setting == 'appEmail') {
            $email = Setting::where('type', 'appEmail')->first();
            if (isset($email) == false) {
                DB::table('settings')->insert([
                    'type'       => 'appEmail',
                    'value'      => json_encode([

                        'name' => 'refat@gmail.com',

                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('settings')->where(['type' => 'appEmail'])->update([
                    'type'       => 'appEmail',
                    'value'      => json_encode([

                        'name' => $request['name'],

                    ]),
                    'updated_at' => now(),
                ]);
            }
        } elseif ($setting == 'appPhone') {
            $phone = Setting::where('type', 'appPhone')->first();
            if (isset($phone) == false) {
                DB::table('settings')->insert([
                    'type'       => 'appPhone',
                    'value'      => json_encode([

                        'name' => '48',

                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('settings')->where(['type' => 'appPhone'])->update([
                    'type'       => 'appPhone',
                    'value'      => json_encode([

                        'name' => $request['name'],

                    ]),
                    'updated_at' => now(),
                ]);
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
