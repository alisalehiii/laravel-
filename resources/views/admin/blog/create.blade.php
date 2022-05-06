@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-3">
             <div class="card">
                 <div class="card-header">
                    ارسال و ساخت بلاگ
                 </div>

                 <div class="card-body">
                 <ul>

<li><a href="{{route('home')}}">داشبورد </a></li>
<li><a href="{{route('home.index')}}">تنظیمات بخش خانه </a></li>
<li><a href="{{route('about.index')}}">تظیمات بخش درباره ما </a></li>
<li><a href="{{route('skill.index')}}">مهارت های من </a></li>
<li><a href="{{route('blog.index')}}">بلاگ ها </a></li>

</ul>
                 </div>
             </div> 
         </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">ارسال بلاگ</div>
                 
                    
                 
                <div class="card-body">
                 <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                  
                    
              
                     <div class="form-group mt-3">
                        <lable for="">عنوان</lable>
                        <input type="text" class="form-control" name="title" >
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                       

                     </div>
                  
                     <div class="form-group mt-3">
                        <lable for="">متن</lable>
                        <textarea type="text" class="form-control" name="description"></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                     </div>
                 
                     <div class="form-group mt-3">
                        <lable for="">عکس</lable>
                        <input type="file" class="form-conntrol" name="image" >
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                     </div>
                     </div>
                     <div class="form-group mt-3">
                   
                 <button class="btn btn-success px-5">ذخیره</button>
               
                      
                </div>
                 </form>
               
                </div>
        
            </div>
        </div>
    </div>
</div>
@endsection
