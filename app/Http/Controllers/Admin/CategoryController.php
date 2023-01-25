<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        return view('backend.pages_backend.categories.index');
    }


    public function create(){

        return view('backend.pages_backend.categories.create');
    }
}