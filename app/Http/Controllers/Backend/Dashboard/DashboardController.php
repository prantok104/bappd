<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard page
    public function dashboardIndexPage()
    {
        return view("Backend.dashboard.index");
    }
}
