@extends('front-end.app')
@section('content')
    <div class="col-lg-9 mb-2">
        @foreach ($cat_par as $c)
            @foreach ($parent as $r)
            @section('title', $c->name)
            @section('description', $c->description)
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home pr-1"></i>Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$r->name}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$c->name}}</li>
                </ol>
            </nav>
            @endforeach
            <div class="list-article">
                @foreach ($arti as $ar)
                    <div class="article">
                    <a href="/post/{{$ar->category->slug}}/{{$ar->slug}}">{{$ar->name}}</a>
                    - <small class="">Đăng bởi : <b>{{$ar->user->name}}</b></small>
                        <p>{{$ar->description}}</p>
                        <hr>
                    </div>
                @endforeach
                <div class="row justify-content-md-center">
                    {{$arti->links()}}
                </div>
            </div>
        @endforeach
    </div>
@stop
@section('sidebar-right')
    @include('front-end.sidebar-right')
@stop