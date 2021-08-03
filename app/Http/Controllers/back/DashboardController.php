<?php
namespace App\Http\Controller\back;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('back-views.dashbord');

    }
}
