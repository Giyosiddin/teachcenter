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
        return view('admin.study-abroad.index', compact('posts'));
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $data['slug'] = $this->createSlug($request->title_en);
            $data['for_slider'] = $request->for_slider ? '1': '0';
            $post = Post::create($data);
            
            if($request->hasFile('image')){			
                $ext_image = $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/study-abroad',$post->id.'.'.$ext_image);
                $post->image = $image;
            }
            if($post){
                $post->save();
                return redirect()->route('study-abroad.index')->with(['msg' => 'Post successfuly created!']);
            }else{
                return back()->withErrors(['msg'=> 'Post successfuly created!'])->withInput();
            }
        }else{

            return view('admin.study-abroad.add');
        }
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        if(!$post){
            return back()->withErrors(['msg' => 'Not found post with this ID'])->withInput();
        }

        if($request->isMethod('get')){
            return view('admin.study-abroad.edit', compact('post'));
        }else{
            $data = $request->all();
            $data['slug'] = $this->createSlug($request->title_en, $id);
            $data['for_slider'] = $request->for_slider ? '1': '0';
            // dd($data);
            $save = $post->update($data);
            if($request->hasFile('image')){			
                $ext_image = $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/posts',$post->id.'.'.$ext_image);
                $post->image = $image;
            }else{
                $post->image = $request->delete_image;
            }
            $post->save();
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
        return view('admin.study-abroad.show', compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $delete = $post->delete();
        if($delete){
            return redirect()->route('study-abroad.index')->with(['msg' => "Post have been deleted successfuly!"]);
        }
        
    }
    public function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Post::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}
