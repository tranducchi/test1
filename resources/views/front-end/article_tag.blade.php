
@extends('front-end.app')
@section('content')
    @foreach ($tag_article as $t)
    @section('title', 'Tổng hợp cảm âm'.' '.$t->name.' sáo trúc')
    <div class="col-lg-9 mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home pr-1"></i>Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tag  </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t->name}}</li>
                </ol>
            </nav>
            @foreach ($t->articles as $v)
                <div class="list-article">
                
                        <div class="article">
                        <a href="/post/{{$v->category->slug}}/{{$v->slug}}">{{$v->title}}</a>
                        -   <small class="">Đăng bởi : <b>{{$v->user->name}}</b></small>
                            <p>{{$v->description}}</p>
                            <hr>
                        </div>
                
                </div>
            @endforeach
            <div class="row justify-content-md-center">
            </div>
    </div>
    @endforeach
@endsection
@section('sidebar-right')
    @include('front-end.sidebar-right')
@endsection