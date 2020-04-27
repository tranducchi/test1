
<div class="col-lg-3 col-md-12 col-12">
    @if(Auth::check())
        <p class="text-center">Xin chào : <b>{{Auth::user()->name}}</b></p>
            <form id="logout-form" action="{{ route('logout') }}" class="text-center" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm mb-2"><i class="fa fa-sign-out pr-1"></i>Đăng xuất</button>
            </form>
       
    @else
        <div class="login text-center mb-3">
            <a class="btn btn-info text-white" href="/login"><i class="fa fa-user pr-1"></i>Đăng nhập</a>
            hoặc
            <a class="btn btn-warning text-black" href="/register"><i class="fa fa-pencil pr-1"></i>Đăng kí</a>
        </div>
    @endif
    <div class="ads mb-2">
        
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
    <!-- Fanpages -->
    <div class="fanpage mb-4 d-lg-none d-xl-block">
        <div class="card">
       
                <div class="card-header bg-info text-white border border-info">
                    <i class="fa fa-thumbs-up"></i>Like Fanpage 
                </div>
       
                <div class="card-body p-0 pt-2">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcamamsaohay%2F&tabs&width=300&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=173828703486140" style="border:none;overflow:hidden" scrolling="no" frameborder="0" rel='nofollow' allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
        </div>
      
        <!-- End Cart -->
    </div>
  
   <!-- End Fanpage -->

   <!-- Categories -->
   <div class="categories">
        <ul class="list-group">
            <li class="list-group-item active bg-info border border-info">
                <i class="fa fa-tags pr-2 text-white"></i>Tags</li>
            @if($tag)
                @foreach ($tag as $t)
                    <li class="list-group-item">
                        <div class='tranfer d-flex justify-content-start'>
                            <h4><a href="/tag/{{$t->slug}}" class="nav-link"><i class="fa fa-chevron-right pr-2"></i>{{$t->name}}</a></h4>
                            <span class="badge badge-pill badge-secondary ml-1">{{$t->articles->count()}}</span>
                        </div>
                    </li> 
                @endforeach
            @endif
        </ul>   
   </div>
    <!-- End categories -->
</div>