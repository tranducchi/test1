
<div class="col-lg-3 col-md-12 col-12">
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
               <h3><i class="fa fa-star text-danger pr-2" aria-hidden="true" style=""></i>Bài viết mới nhất</h3> 
            </div>
            <div class="card-body">
                @if($new_post)
                    @foreach ($new_post as $p)
                    <div class="top-article">
                    <a href="/post/{{$p->category->slug}}/{{$p->slug}}">{{$p->name}}</a>
                                <i class="fa fa-eye text-danger ">{{$p->views}} lượt xem</i>
                     <i class="fa fa-user">
                        @foreach($p->tags as $t)
                         
                        <a href="/tag/{{$t->slug}}" class="text-secondary">
                            {{$t->name}}
                        </a></i>
                        @endforeach
                    </div>
                      
                @endforeach
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>
                    <i class="fa fa-star text-warning pr-2" aria-hidden="true" style=""></i>Bài viết được xem nhiều
                </h3>
               
            </div>
            <div class="card-body">
                @if ($new_hot)
                    @foreach ($new_hot as $n)
                    <div class="top-article">
                        <a href="/post/{{$n->category->slug}}/{{$n->slug}}">{{$n->name}}</a>
                        <i class="fa fa-eye text-danger ">{{$n->views}} lượt xem</i>
                        <i class="fa fa-user"><a href="" class="text-secondary">
                            @foreach($n->tags as $t)
                            {{$t->name}}
                            @endforeach
                        </a></i>
                    </div>
                    @endforeach
                @endif
         
            </div>
        </div>
        <!-- End card -->
        <div class="ads mt-2">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Right -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-5047614611394708"
                 data-ad-slot="2314617745"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
</div>
