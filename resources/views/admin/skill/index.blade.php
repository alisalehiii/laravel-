@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-3">
             <div class="card">
                 <div class="card-header">
                    تنظیمات بخش مهارت های من
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
                <div class="card-header">تنظیمات بخش مهارت های من</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <table id="customers">
  <tr>
    <th>درصد مهارت</th>
    <th>عنوان مهارت</th>
    <th>ویرایش</th>
    <th>حذف</th>
  </tr>
  @foreach($skill as $item)
  <tr>
    
    <td>{{$item->precentage}}</td>
    <td>{{$item->title}} </td>
   
    <td><a href="{{route('skill.edit' , ['id'=>$item->id]) }}">ویرایش</a> </td>
    <td>
    <a href="" onclick="destroyUser( event,{{$item->id}})">حذف</a>
    <form action="{{route('skill.destroy' , $item->id)}}" id="userdelete{{$item->id}}" method="post">
        @csrf
        @method('delete')
    </form>
    </td>
    
  </tr>
  @endforeach   
  
  </table>
  <a class="btn btn-success px-4 mt-3" href="{{route('skill.create')}}">تنظیم بخش مهارت های من</a> 
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




 
             