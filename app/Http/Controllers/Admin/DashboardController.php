<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index
    public function index(){
        
        return view('backend.pages_backend.dashboard.index');

    }
}
