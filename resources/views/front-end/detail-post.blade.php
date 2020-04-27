
@extends('front-end.app')
@section('content')
    <div class="col-lg-9 mb-2">
        <div class="container">
       
            @foreach ($article as $a)
                
     
                @section('title', $a->title)
                @section('description', $a->description)
                @section('fb-title', $a->title)
                @section('fb-img','http://playnhaccu.com/storage/public/images/'.$a->image)
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home pr-1"></i>Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$a->category->name}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$a->name}}</li>
                </ol>
            </nav>
           
            <div class="article detail" id="content">
                <h1 class="text-center">{{$a->title}}</h1> 
                <div class="d-block justify-content-center"><img src="/storage/public/images/{{$a->image}}" class="img-fluid pt-2 pb-2" alt="{{$a->title}}" /></div>
                <div class="fb-share-button" 
    data-href="http://playnhaccu.com/post/{{$a->category->slug.'/'.$a->slug}}" 
    data-layout="button_count">
  </div>
                  <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));
              </script>
                <span class="d-flex justify-content-between pt-2 pb-2">
                    <div class="info-1">
                        <small>
                            <i class="fa fa-eye pr-1"></i>Lượt xem : <b>{{$a->views}}</b>
                        </small>
                    </div>
                    <div class="info-2 d-none d-sm-block">
                            <small>
                            <i class="fa fa-user pr-1"></i>Người đăng : <b>{{$a->user->name}}</b>
                            </small>
                            /
                            <small>
                                <i class="fa fa-clock-o pr-1"></i>Time : <b>{{$a->created_at->toDateString()}}</b>
                            </small>
                    </div>
                </span>
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="ca-pub-5047614611394708"
                     data-ad-slot="5719757704"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                {!!$a->body!!}
            </div>
            <div class="tag">
                <i class="fa fa-tags"></i>Tags : 
                @foreach ($a->tags as $t)
                   
                <a href="/tag/{{$t->slug}}" class="badge badge-secondary">{{$t->name}}</a>
                @endforeach
            </div>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="autorelaxed"
                 data-ad-client="ca-pub-5047614611394708"
                 data-ad-slot="8474697371"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <div class="related mt-3 ">
                <p>Bài viết liên quan :</p>
                <div class="row d-flex justify-content-between">
                    @foreach ($related as $r)
                        <div class="col-sm-12 col-lg-4">
                           
                            <div class="card">
                                <div class="card-body">
                                    <img src="/storage/public/images/{{$r->image}}" alt="{{$r->title}}">
                                    <h5 class="card-title"><a href="/post/{{$r->category->slug}}/{{$r->slug}}">{{$r->name}}</a></h5>
                                    <div class="icon d-flex justify-content-between">
                                        <div class="view">
                                            <i class="fa fa-eye"></i>
                                            {{$r->views}}
                                        </div>
                                        <div class="category">
                                            <i class="fa fa-folder"></i>
                                            {{$r->category->name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="comment mt-3">
                @if(Auth::check())
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                        
                        </div>
                
                    
                    @endif
                    <p><i class="fa fa-pencil pr-1"></i>Bình luận bài viết : </i></p>
                    <form action="/comment" method="post">
                        @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="article_id" value="{{$a->id}}">
                        <textarea name="content" class="form-control" placeholder="Nhận xét bài viết ..." id="" cols="30" rows="4"></textarea>
                        <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-warning btn-sm mt-2"><i class="fa fa-paper-plane pr-1"></i>Bình luận</button>
                        </div>
                    </form>
                    @else
                        {!!"<div class='alert alert-warning text-center'>Đăng nhập để bình luận bài viết</div>"!!}
                    @endif
                <br/>
                @if($a->comments->count() > 0)
                    
                        <div class="list-comment">
                                @foreach ($a->comments as $c)
                                    <div class="card mb-2">
                                        <div class="card-header">
                                            <i class="fa fa-user pr-1"></i>{{$c->user->name}}
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{$c->content}}</p>
                                        </div>  
                                    </div>
                                @endforeach
                        </div>
                   
                @endif
            </div>
            @endforeach
        </div>
    <form class="play">
        <div class="form-group row">
            <div class="col-10">
                <input type="range" class="form-control-range" value="200000" step="10000" class="speed" id="speed" min="4000" max="200000">
            </div>
            <div class="col-2">
                <a href="#" class="next"><i class="fa fa-play"></i></a>
                <a href="#" class="stop"><i class="fa fa-stop"></i></a>
            </div>
          
        </div>
    </form>
    </div>

@stop
@section('sidebar-right')
    @include('front-end.sidebar-right')
@stop