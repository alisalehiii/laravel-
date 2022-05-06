@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-3">
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
                <div class="card-header">تنظیمات بخش خانه وب سایت</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    این تنظیمات بخش خانه است    
                    <table id="customers">
  <tr>
    <th>عنوان</th>
    <th>درباره</th>
    <th>شغل</th>
    <th>توضیح</th>
    <th>لینک</th>
    <th>عکس</th>  
    <th>ویرایش</th>
    <th>حذف</th>
  </tr>
     @foreach($home as $item)
  <tr>
    <td>{{$item->title}} </td>
    <td> {{$item->subject}}</td>
    <td>{{$item->job}}</td>
    <td>{{$item->description}}</td>
    <td>{{$item->link}}</td>
    <td><img src="{{asset('admin/images/home/' . $item->image) }}" width="80"></td>
    <td><a href="{{route('home.edit' , ['id'=>$item->id]) }}">ویرایش</a> </td>
    <td>
    <a href="" onclick="destroyUser( event,{{$item->id}})">حذف</a>
    <form action="{{route('home.destroy' , $item->id)}}" id="userdelete{{$item->id}}" method="post">
        @csrf
        @method('delete')
    </form>
    </td>
    
    </tr>
   @endforeach   

     
</table>
 <a class="btn btn-success px-4 mt-3" href="{{route('about.create')}}">تنظیم بخش درباره ما</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>

function destroyUser(event,id){
    event.preventDefault();
    document.querySelector('#userdelete' +id).submit();
}

</script>

@endsection
