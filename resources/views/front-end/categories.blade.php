
@extends('front-end.app')

@section('content')
    <div class="col-lg-9 mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home pr-1"></i>Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    @foreach($cat_name as $c)
                        {{$c->name}}
                   
                    </li>
                </ol>
                @section('title', 'Chuyên Mục '.$c->name)
                @section('description', $c->description)
                @section('fb-title', $c->name)
                @section('fb-des', $c->description)
                @section('fb-img', $c->image)
            </nav>
            <h2 class="text-center pb-3">Danh sách chuyên mục : {{$c->name}}</h2>
            @endforeach
            <div class="main-categories">
                    <div class="row">
                        @if($parent_cat->count() > 0)
                            @foreach ($parent_cat as $pc)
                                <div class="col-sm-12 md-4 col-lg-4 mb-4">
                                    <div class="card text-card">
                                        <a href="/category/{{$c->slug}}/{{$pc->slug}}" class="pt-3">
                                            <div class="card-body text-center">
                                                <b>{{$pc->name}}</b>
                                                <p>
                                                    <small>({{$pc->articles->count()}} bài)</small>
                                                </p>
                                            
                                            </div>
                                        </a>
                                    
                                    </div>
                                </div>
                            @endforeach
                        @else
                        {!!"<span class='alert alert-warning col-lg-12'>Không có bài viết</span>"!!}
                        <a href="/"><i class="fa fa-arrow-circle-left pr-2"></i>Quay về trang chủ</a>
                        @endif
                    </div>
            </div>
    </div>
@stop
@section('sidebar-right')
    @include('front-end.sidebar-right')
@stop