<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// requests
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){

        return view('backend.pages_backend.categories.index');
    }


    public function create(){

        return view('backend.pages_backend.categories.create');
    }

    public function store(CategoryFormRequest $request){
        // pick validations from category form request
        $validatedData = $request->validated();
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        
        // category image
        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/', $filename);
            $category->image = $filename;

        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keywords = $validatedData['meta_keywords'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1':'0';

        // save
        // dd($category);

        $category->save();
        // redirect
        return redirect('admin/categories')->with('message','Category added successfuly');




        return view('backend.pages_backend.categories.create');
    }
}
