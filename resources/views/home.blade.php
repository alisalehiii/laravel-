@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class=col-md-3>
             <div class="card">
                 <div class="card-header">
                     تنظیمات صفحه اصلی سایت
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
                <div class="card-header">خوش آمدید</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    شما میتونین از سمت راست تنظیمات را تغییر بدهید
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
