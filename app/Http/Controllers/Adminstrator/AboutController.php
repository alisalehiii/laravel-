<?php

namespace App\Http\Controllers\Adminstrator;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::all();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.about.create');
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
            'link'=>'required|min:3|max:20',
          
            
         ],  [
             
            'title.required'=>'وارد کردن عنوان الزامی است',
            'description.required'=>'وارد کردن متن الزامی است',
            'link.required'=>'وارد کردن لینک الزامی است',
           
        
         ]);

        About::create([

            'title'=>$request->title,
            
            'description'=>$request->description,
            
            'link'=>$request->link,

        ]);
        return redirect()->route('about.index');
    
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
        $about=About::findOrFail($id);
        return view('admin.about.edit',compact('about'));
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
            'link'=>'required|min:3|max:20',
          
            
         ],  [
             
            'title.required'=>'وارد کردن عنوان الزامی است',
            'description.required'=>'وارد کردن متن الزامی است',
            'link.required'=>'وارد کردن لینک الزامی است',
           
        
         ]);

       $about=About::findOrFail($id);
       $about->update([
           
        'title'=>$request->title,
            
        'description'=>$request->description,
        
        'link'=>$request->link,
        

       ]);
       return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=About::findOrFail($id);
        $about->destroy($id);
        return redirect()->route('about.index');
    }
}
