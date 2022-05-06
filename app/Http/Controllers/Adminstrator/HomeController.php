<?php

namespace App\Http\Controllers\AdminStrator;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AdminStrator\Validator;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::all();
      return view('admin.home.index',compact('home'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
        
        return view ('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
         $validate=$request->validate([
                    
            'title'=>'required|min:3|max:20',
            'subject'=>'required|min:3|max:20',
            'job'=>'required|min:3|max:20',
            'description'=>'required|min:3|max:20',
            'link'=>'required|min:3|max:20',
            'image'=>'required'
            
         ],  [
             
            'title.required'=>'وارد کردن عنوان الزامی است',
            'subject.required'=>'وارد کردن نام الزامی است',
            'job.required'=>'وارد کردن شغل الزامی است',
            'description.required'=>'وارد کردن متن الزامی است',
            'link.required'=>'وارد کردن لینک الزامی است',
            'image.required'=>'وارد کردن عکس الزامی است',
            

         ]);

    
     
        $file=$request->file('image');
             $image="";
             if(!empty($file)){
             $image = time().".".$file->getClientOriginalExtension();
             $file->move('admin/images/home',$image);
           
       }


        Home::create([
            'image'=>$image,
            'title'=>$request->title,
            'subject'=>$request->subject,
            'job'=>$request->job,
            'description'=>$request->description,
       
            'link'=>$request->link, 
        ]);

      //  $file=$request->file('image');
      //  $image="";
       // if(!empty($file)){
       //     $image = time().".".$file->getClientOriginalExtension();
        //    $file->move('admin/images/home',$image);

       
             return redirect()->route('home.index');
     //   Home::create([
     }       
      //      'image'=>$image,
       //     'title'=>$request('title'),
      //      'subject'=>$request('subject'),
      //      'gob'=>$request('gob'),
       //     'description'=>$request('description'),
       //     'link'=>$request('link'),
               
      //  ]);

  //      return redirect()->route('home.store');
  //  }

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
        $home= Home::findOrfail($id);

        return view('admin.home.edit' , compact('home'));
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
            'subject'=>'required|min:3|max:20',
            'job'=>'required|min:3|max:20',
            'description'=>'required|min:3|max:20',
            'link'=>'required|min:3|max:20',
          
            
         ],  [
             
            'title.required'=>'وارد کردن عنوان الزامی است',
            'subject.required'=>'وارد کردن نام الزامی است',
            'job.required'=>'وارد کردن شغل الزامی است',
            'description.required'=>'وارد کردن متن الزامی است',
            'link.required'=>'وارد کردن لینک الزامی است',
           
        
         ]);

       


       $home=Home::findOrfail($id);
       $file=$request ->file('image');
       $image="";
       if(!empty($file)){
       if(file_exists('admin/images/home/' . $home->image)){
           unlink('admin/images/home/' . $home->image);
          }
          $image= time().".".$file->getClientOriginalExtension();
          $file->move('admin/images/home' ,$image );

       }else{
           $image = $home->image;
       }
       $home->update([
           'image'=>$image,
           'title'=>$request->title,
           'subject'=>$request->subject,
           'job'=>$request->job,
           'description'=>$request->description,
            'link'=>$request->link, 

       ]);
       return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home = Home::findOrFail($id);
        if(file_exists('admin/images/home/' .$home->image)){
            unlink('admin/images/home/' .$home->image);
        }
     $home->destroy($id);
     return redirect()->route('home.index');
  }

}
