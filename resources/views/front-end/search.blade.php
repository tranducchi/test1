
@extends('front-end.app')
@section('content')
   
     
        @section('title', 'Tìm kiếm')
        <div class="col-lg-9 mb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="fa fa-home pr-1"></i>Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bài Viết</li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                    </ol>
                </nav>
                
                @if($data->count() > 0)
                    <div class="alert alert-warning">Tìm thấy {{$data->count()}} kết quả cho từ khóa "<b>{{$query}}</b>"</div>
                    @foreach ($data as $v)
                        <div class="list-article">
                        
                                <div class="article">
                                <a href="/post/{{$v->category->slug}}/{{$v->slug}}">{{$v->title}}</a>
                                -   <small class="">Đăng bởi : <b>{{$v->user->name}}</b></small>
                                    <p>{{str_limit($v->description,130)}}</p>
                                    <hr>
                                </div>
                        
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">{{ $data->appends(['key' => $query])->links()}}</div>
                @else
                 {!!"<div class='alert alert-warning'>Không tìm thấy bài viết nào !</div>"!!}
                @endif
             
        </div>
   
        
  
@endsection
@section('sidebar-right')
    @include('front-end.sidebar-right')
@endsection