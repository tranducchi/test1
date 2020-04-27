@extends('front-end.app')
@section('title', 'Cảm âm sáo trúc chuẩn | Học sáo trúc 2019')
@section('description', 'Thư viện cảm âm lớn nhất dành cho sáo trúc, nơi chia sẻ những bài cảm âm nhạc trẻ, nhạc trữ tình hay nhất và chuẩn xác nhất cho sáo trúc')
@section('sidebar-left')
    @include('front-end.sidebar-left')
@stop
@section('content')
<div class="col-lg-6 col-md-12 col-12">
    <div class="card">
        <div class="card-header bg-info border border-info text-white">
        <i class="fa fa-music" style="font-size:19px; padding-right:10px" aria-hidden="true"></i>
            Danh sách bài viết
        </div>
        <div class="card-body listarticle">
            @foreach ($ar as $a)
                <article class="article pb-3 pt-3 border-bottom">
                    <div class="row">
                        <div class="col-lg-3 col-3">
                            <a href="/post/{{$a->category->slug}}/{{$a->slug}}">
                            <img src="{{ url('storage/public/images/' . $a->image) }}" class="img-fluid" alt="{{$a['title']}}">
                            </a>  
                        </div>
                        <div class="col-lg-9 col-9">
                            <h4><a href="/post/{{$a->category->slug}}/{{$a->slug}}">{{$a['title']}}</a></h4>
                            <p class="pt-2 pb-2 mb-0 d-none d-sm-block">{{ str_limit($a['description'], 100) }}</p>
                            <div class="icon">
                                <div class="row">
                                    <div class="col-lg-4 d-none d-sm-block">
                                        <a href=""><i class="fa fa-folder pr-1"></i>{{$a->category->name}}</a>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <a href=""><i class="fa fa-comment pr-1"></i>{{$a->comments->count()}} Bình luận</a>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <a href=""><i class="fa fa-eye pr-1"> {{$a->views}}</i>Lượt xem</a>
                                    </div>
                                </div>
                                <!-- End row -->
                            </div>
                            <!-- End icon -->
                            <a href="/post/{{$a->category->slug}}/{{$a->slug}}" class="btn btn-info btn-sm an">Xem thêm<i class="fa fa-chevron-circle-right pl-2"></i></a>
                        </div>
                    </div>
                </article>  
            @endforeach
        </div>
        <div class="d-flex justify-content-center pb-2">
            <button class="btn btn-info btn-sm p-2" id="load">Xem thêm <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
            <img src="{{ url('storage/public/images/load.gif') }}" class="icon-load"/>
        </div>
    </div>
    <!-- Paginate -->
 
</div>
@stop
@section('sidebar-right')
    @include('front-end.sidebar-right')
@stop
