@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-3">
             <div class="card">
                 <div class="card-header">
                ساخت بخش تنظیمات مهارت
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
                <div class="card-header">ویرایش بخش مهارت</div>
                 
                    
                 
                <div class="card-body">
                 <form action="{{route('skill.update',$skill->id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('put')
                    
              
                     <div class="form-group mt-3">
                        <lable for="">درصد مهارت</lable>
                        <input type="text" class="form-control" value="{{$skill->precentage}}" name="precentage" >
                        @error('precentage')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                       

                     </div>
                     
                     <div class="form-group mt-3">
                        <lable for="">عنوان درضد</lable>
                        <input type="text" class="form-control" value="{{$skill->title}}"  name="title" >
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                     </div>
                  
                     </div>
                     <div class="form-group mt-3">
                   
                 <button type="submit" class="btn btn-success px-5">ارسال</button>
               
                      
                </div>
                 </form>
               
                </div>
        
            </div>
        </div>
    </div>
</div>
@endsection
