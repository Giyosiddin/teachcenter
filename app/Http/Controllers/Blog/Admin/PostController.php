<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.news.index', compact('posts'));
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $data['slug'] = Str::slug($request->title_en);
            $post = Post::create($data);
            if($request->hasFile('image')){			
                $ext_image = $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/news',$post->id.'.'.$ext_image);
                $post->image = $image;
            }
            if($post){
                $post->save();
                return redirect()->route('news.index')->with(['msg' => 'Post successfuly created!']);
            }else{
                return back()->withErrors(['msg'=> 'Post successfuly created!'])->withInput();
            }
        }else{

            return view('admin.news.add');
        }
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        if(!$post){
            return back()->withErrors(['msg' => 'Not found post with this ID'])->withInput();
        }

        if($request->isMethod('get')){
            return view('admin.news.edit', compact('post'));
        }else{
            $data = $request->all();
            $save = $post->update($data);
            if($save){
                return back()->with(['msg' => 'Post has been updated successfuly!']);
            }else{
                return back()->withErrors(['msg' => 'Post has not been updated, something went wrong.'])->withInput();
            }
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.news.show', compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $delete = $post->delete();
        if($delete){
            return redirect()->route('news.index')->with(['msg' => "Post have been deleted successfuly!"]);
        }
        
    }
}
