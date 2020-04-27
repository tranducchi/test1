@section('title', 'Beat'."Name")
@extends('front-end.app');
@section('content')
<div class="col-lg-9 mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home pr-1"></i>Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">
            </li>
        </ol>
    </nav>
    <h2 class="text-center pb-3">Danh sách chuyên mục :</h2>
 
    <div class="main-categories">
            <div class="row">
            
                        <div class="col-sm-12 md-4 col-lg-4 mb-4">
                            <div class="card text-card">
                                <a href="" class="pt-3">
                                    <div class="card-body text-center">
                                        <b>Tên</b>
                                        <p>
                                            <small>Bài</small>
                                        </p>
                                    
                                    </div>
                                </a>
                            
                            </div>
                        </div>
            </div>
    </div>
</div>
@endsection

@section('sidebar-right')
    @include('front-end.sidebar-right')
@stop