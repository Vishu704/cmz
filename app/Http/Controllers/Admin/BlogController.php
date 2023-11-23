<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $data['page_title'] = "Blog";
        $blogs = Blog::paginate('10');
        $data['blogs'] = $blogs;
        return view('admin.blog.list')->with($data);
    }

    public function addBlog(){ 
        $data['page_title'] = "Add Blog";
        return view('admin.blog.add')->with($data);
    }

    public function saveBlog(Request $request){ 
        $validated = $request->validate([
            'blog_title' => 'required',
            'blog_slug' => 'required',
            'meta_keyword' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'blog_description' => 'required',
            'status' => 'required',
        ]);
         $Blog = new Blog();
        //On left field name in DB and on right field name in Form/view
        $Blog->blog_title = $request->input('blog_title');
        $Blog->blog_slug = $request->input('blog_slug');
        $Blog->meta_keyword = $request->input('meta_keyword');
        $Blog->meta_title = $request->input('meta_title');
        $Blog->meta_description = $request->input('meta_description');
        $Blog->blog_description = $request->input('blog_description');
        if($request->input('image')!=''){
            $Blog->image = $request->input('image');
        }
        $Blog->status = $request->input('status');
        $Blog->save();
        return redirect()->back()->with('message', 'Blog added Successfully!');
    }

    public function editBlog(Request $request){ 
        $data['page_title'] = "Edit Testimonial";
        $blog_detail = Blog::where('id',$request->id)->first();
        $data['blog_detail'] = $blog_detail;
        return view('admin.blog.edit')->with($data);
    }

    public function updateBlog(Request $request){
        $validated = $request->validate([
            'blog_title' => 'required',
            'blog_slug' => 'required',
            'meta_keyword' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'blog_description' => 'required',
            'status' => 'required',
        ]);

        $Blog = Blog::find($request->id);
        //On left field name in DB and on right field name in Form/view
        if($Blog) {
        $Blog->blog_title = $request->input('blog_title');
        $Blog->blog_slug = $request->input('blog_slug');
        $Blog->meta_keyword = $request->input('meta_keyword');
        $Blog->meta_title = $request->input('meta_title');
        $Blog->meta_description = $request->input('meta_description');
        $Blog->blog_description = $request->input('blog_description');
        $Blog->status = $request->input('status');
        $Blog->save(); 
        return redirect()->back()->with('message', 'Blog Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Blog Not Updated!'); 
        }
    }

    public function deleteBlog(Request $request){
        Blog::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Blog deleted Successfully!');
    }
}
