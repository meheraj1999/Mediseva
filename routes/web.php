<?php

use App\Http\Controllers\back\MemberController;
use App\Http\Controllers\back\MessagesController;
use App\Http\Controllers\back\PdfDownloadController;
use App\Http\Controllers\back\DoctorController;
use App\Http\Controllers\back\ServiceController;
use App\Http\Controllers\back\SettingController;
use App\Http\Controllers\back\SliderController;
use App\Http\Controllers\back\HospitalController;
use App\Http\Controllers\back\DepertmentController;
use App\Http\Controllers\front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/pdf', [HomeController::class, 'allPdf'])->name('allPdf');

Route::get('/notice', [HomeController::class, 'notice'])->name('notice');
Route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor');
Route::get('/hospital', [HomeController::class, 'hospital'])->name('hospital');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/list/{type}', [HomeController::class, 'member'])->name('memberList');

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    Route::get('/home', [HomeController::class, 'contactView'])->name('home');
    Route::post('/contact', [HomeController::class, 'contact'])->name('store');
});

Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
        return view('back-views.dashbord');
    })->name('admin');

    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', [SliderController::class, 'index'])->name('slider.home');

        Route::get('create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('status/{id}', [SliderController::class, 'status'])->name('slider.status');
        Route::get('edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');

    });

    Route::group(['prefix' => 'doctor'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name('doctor.home');

        Route::get('create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::post('store', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('status/{id}', [DoctorController::class, 'status'])->name('doctor.status');
        Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
        Route::put('update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
        Route::delete('delete/{id}', [DoctorController::class, 'destroy'])->name('doctor.delete');

    });

    Route::group(['prefix' => 'pdf'], function () {
        Route::get('/', [PdfDownloadController::class, 'index'])->name('pdf.home');
        Route::get('create/{id}', [PdfDownloadController::class, 'show'])->name('pdf.show');

        Route::get('create', [PdfDownloadController::class, 'create'])->name('pdf.create');
        Route::post('store', [PdfDownloadController::class, 'store'])->name('pdf.store');
        Route::get('status/{id}', [PdfDownloadController::class, 'status'])->name('pdf.status');
        Route::get('edit/{id}', [PdfDownloadController::class, 'edit'])->name('pdf.edit');
        Route::put('update/{id}', [PdfDownloadController::class, 'update'])->name('pdf.update');
        Route::delete('delete/{id}', [PdfDownloadController::class, 'destroy'])->name('pdf.delete');

    });
    Route::group(['prefix' => 'hospital', 'as' => 'hospital.'], function () {
        Route::get('/', [HospitalController::class, 'index'])->name('home');

        Route::get('create', [HospitalController::class, 'create'])->name('create');
        Route::post('store', [HospitalController::class, 'store'])->name('store');
        Route::get('status/{id}', [HospitalController::class, 'status'])->name('status');
        Route::get('edit/{id}', [HospitalController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [HospitalController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [HospitalController::class, 'destroy'])->name('delete');

    });
    Route::group(['prefix' => 'depertment', 'as' => 'depertment.'], function () {
        Route::get('/', [DepertmentController::class, 'index'])->name('home');

        Route::get('create', [DepertmentController::class, 'create'])->name('create');
        Route::post('store', [DepertmentController::class, 'store'])->name('store');
        Route::get('status/{id}', [DepertmentController::class, 'status'])->name('status');
        Route::get('edit/{id}', [DepertmentController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [DepertmentController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [DepertmentController::class, 'destroy'])->name('delete');

    });
    Route::group(['prefix' => 'members', 'as' => 'members.'], function () {
        Route::get('list/{status}', [MemberController::class, 'index'])->name('home');

        Route::get('create', [MemberController::class, 'create'])->name('create');
        Route::post('store', [MemberController::class, 'store'])->name('store');
        Route::get('status/{id}', [MemberController::class, 'status'])->name('status');
        Route::get('edit/{id}', [MemberController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [MemberController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [MemberController::class, 'destroy'])->name('delete');

    });
    Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('home');

        Route::get('create', [ServiceController::class, 'create'])->name('create');
        Route::post('store', [ServiceController::class, 'store'])->name('store');
        Route::get('status/{id}', [ServiceController::class, 'status'])->name('status');
        Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ServiceController::class, 'destroy'])->name('delete');

    });
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting.home');

        Route::get('our-vision', [SettingController::class, 'our_vision'])->name('setting.vision');
        Route::post('our-vision', [SettingController::class, 'our_VisionUpdate'])->name('setting.visionUpdate');

        Route::get('about-us', [SettingController::class, 'about_us'])->name('setting.about');
        Route::post('about-us', [SettingController::class, 'about_usUpdate'])->name('setting.aboutUpdate');
        Route::post('{name}', [SettingController::class, 'update'])->name('setting.pray');

    });
    Route::get('/video', [SettingController::class, 'video'])->name('setting.video');

    Route::get('/view', [SettingController::class, 'setting'])->name('setting.index');
    Route::post('config/{setting}', [SettingController::class, 'appUpdate'])->name('setting.app');
    Route::get('/social', [SettingController::class, 'socialView'])->name('setting.social');
    Route::post('socialUpdate/{social}', [SettingController::class, 'socialUpdate'])->name('setting.socialLink');

    Route::group(['prefix' => 'messages', 'as' => 'message.'], function () {
        Route::get('/list', [MessagesController::class, 'list'])->name('list');
        Route::delete('delete/{id}', [MessagesController::class, 'destroy'])->name('delete');
        Route::get('view/{id}', [MessagesController::class, 'view'])->name('view');

    });

});
