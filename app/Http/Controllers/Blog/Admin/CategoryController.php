<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.category.create');
        }else{
            $data = $request->all();
            $save = Category::create($data);
            if($save){
                return redirect()->route('category.index')->with(['msg' => 'Category has been created successfuly!']);
            }else{
                return back()->withErrors(['msg' => 'Category not created, there was error!'])->withInput();
            }
        }
    }
    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if(!$category){
            return back()->withErrors(['msg' => "Category not found"]);
        }
        if($request->isMethod('get')){
            return view('admin.category.edit', compact('category'));
        }else{

        }
    }
}
