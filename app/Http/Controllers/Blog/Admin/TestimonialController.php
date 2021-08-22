<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonial.index', compact('testimonials')); 
    }

    public function create(Request $request)
    {
        
        if($request->isMethod('get')){
            return view('admin.testimonial.create');
        }else{
            $validation = $request->validate([
                'name_uz' => 'required|max:255',
                'name_ru' => 'required|max:255',
                'name_en' => 'required|max:255',
                'direction_uz' => 'required|max:255',
                'direction_ru' => 'required|max:255',
                'direction_en' => 'required|max:255',
                'image' => 'required|max:255',
                'text_uz' => 'required',
                'text_ru' => 'required',
                'text_en' => 'required',
            ]);
            $data = $request->all();
            $testimonial = Testimonial::create($data);
            if($request->hasFile('image')){			
                $ext_image = $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/photos',$testimonial->id.'.'.$ext_image);
                $testimonial->image = $image;
                $testimonial->save();
            }
            if($testimonial){
                return redirect()->route('admin.testimonials')->with(['msg' => 'Testimonial has been created successfuly!']);
            }else{
                return back()->withErrors(['msg' => 'Item has not been created, check all options and save again!'])->withInput();
            }
        }

    }

    public function edit(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        if($request->isMethod('get')){
            return view('admin.testimonial.edit', compact('testimonial'));
        }else{
            // dd('ddd');
            $request->validate([
                'name_uz' => 'required|max:255',
                'name_ru' => 'required|max:255',
                'name_en' => 'required|max:255',
                'direction_uz' => 'required|max:255',
                'direction_ru' => 'required|max:255',
                'direction_en' => 'required|max:255',
                'text_uz' => 'required',
                'text_ru' => 'required',
                'text_en' => 'required',
            ]);
            $data = $request->all();
            // dd($data);
            $update = $testimonial->update($data);
            if($request->hasFile('image')){			
                // dd($request->file('image'));
                $ext_image = $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/testimonial',$id.'.'.$ext_image);
                $testimonial->image = $image;
            }else{
                $testimonial->image = $request->delete_image;
            }
            $testimonial->save();
            if($update){
                return redirect()->route('admin.testimonials')->with(['msg' => 'Testimonial has been created successfuly!']);
            }else{
                return back()->withErrors(['msg' => 'Item has not been created, check all options and save again!'])->withInput();
            }
        }

    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        if(!$testimonial){
            return back()->withErrors(['msg' => 'Testimonial not found!']);
        }
        $testimonial->delete();
        return back()->with(['msg' => 'Testimonial has been deleted successfuly!']);
    }
}
