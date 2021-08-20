<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(12);
        return view('admin.page.index', compact('pages'));
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){
            $parents = Page::all();
            return view('admin.page.create', compact('parents'));
        }else{
            $validated = $request->validate([
                'title_uz' => 'required|max:255',
                'title_ru' => 'required|max:255',
                'title_en' => 'required|max:255',
            ]);
            $data = $request->all();
            $data['slug'] = $this->createSlug($request->title_en);
            $page = Page::create($data);
            // dd($page);
            if($request->hasFile('image')){			
                $ext_image = $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/pages',$page->id.'.'.$ext_image);
                $page->image = $image;
            }
            
            $page->save();
            if($page){
                return redirect()->route('admin.page')->with(['msg' => 'Page has created successfuly!']);
            }else{
                return back()->withErrors(['msg'=>''])->withInput();
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $page = Page::find($id);
        if(!$page){
            return back()->withErrors(['msg' => 'Not found page with this ID'])->withInput();
        }

        if($request->isMethod('get')){
            $parents = Page::where('id','!=', $id)->get();
            return view('admin.page.edit', compact('page','parents'));
        }else{
            $data = $request->all();
            $data['slug'] = $this->createSlug($request->title_en, $id);
            // dd($data);
            $save = $page->update($data);
            if($request->hasFile('image')){			
                $ext_image = $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/posts',$page->id.'.'.$ext_image);
                $page->image = $image;
            }else{
                $page->image = $request->delete_image;
            }
            $page->save();
            if($save){
                return back()->with(['msg' => 'page has been updated successfuly!']);
            }else{
                return back()->withErrors(['msg' => 'page has not been updated, something went wrong.'])->withInput();
            }
        }

    }

    /** Generate unique slug */
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
        return Page::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}
