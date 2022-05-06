<?php

namespace App\Http\Controllers\Adminstrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::get();
        return view ('admin.blog.index',compact('blog'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
                    
            'title'=>'required|min:3|max:20',
            'description'=>'required|min:3|max:20',
            'image'=>'required|min:3|max:20',
          
            
         ],  [
             
            'title.required'=>'وارد کردن عنوان الزامی است',
            'description.required'=>'وارد کردن متن الزامی است',
            'image.required'=>'وارد کردن عکس الزامی است',
           
        
         ]);

         


        $file = $request->file('image');
        $image ="";
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/blogs',$image);
          
          

        }
        Blog::create([
            'image'=> $image,
            'title' => $request->title,
            'description'=>$request->description
        ]);
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog= Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate=$request->validate([
                    
            'title'=>'required|min:3|max:20',
            'description'=>'required|min:3|max:20',
            'image'=>'required'
          
            
         ],  [
             
            'title.required'=>'وارد کردن عنوان الزامی است',
            'description.required'=>'وارد کردن متن الزامی است',
            'image.required'=>'وارد کردن عکس الزامی است',
           
        
         ]);



        $blog= Blog::findOrFail($id);
        $file = $request->file('image');
        $image="";
        if(!empty($file)){
            if(file_exists('admin/images/blogs/' .$blog->image)){
                unlink('admin/images/blogs/' .$blog -> image);

            }
            $image= time().".".$file->getCloentOriginalExtension();
            $file->move('admin/images/blogs/' ,$image);

        }else{
            $image=$blog->image;
        }
        $blog->update([
            'image'=> $image,
            'title' => $request->title,
            'description'=>$request->description
        ]);
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::findOrfail($id);
        if(file_exists('admin/images/blogs/' .$blog->image)){
            unlink('admin/images/blogs/' .$blog->image);
        }
        $blog->destroy($id);
        return redirect()->route('blog.index');
    }
}
