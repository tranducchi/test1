<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="csrf_token()">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link rel="shortcut icon" type="image/png" href="/storage/public/images/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/load.js')}}"></script>
    <!--Facebook-->
    <meta property="og:image:width" content="474" />
    <meta property="og:image:height" content="248" />
   
    <meta property="og:image:type" content="image/png" /> 
    <meta property="fb:app_id" content="1716636978626194" />
    <meta property="og:title" content="@yield('fb-title')" />
    <meta property="og:image" content="@yield('fb-img')" />
    <!--End facebook-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-93113202-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-93113202-2');
    </script>

     <!--Adesense auto-->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-5047614611394708",
          enable_page_level_ads: true
     });
</script>
    <!--End Adsense auto-->
</head>
<!--No copy-->
<style>
body{
-webkit-touch-callout: none;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}
</style><script type=”text/JavaScript”>
function killCopy(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function (“return false”)
if (window.sidebar){
document.onmousedown=killCopy
document.onclick=reEnable
}
</script>

<!--End No copy-->
<body>
    {{-- Navbar --}}
    @include('front-end.navbar')
    <!-- End NavBar -->

    <!-- Main content -->
    <section id="main-content" class="container-fluid mt-2">
                <div class="ads mb-2">
                    
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Header -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-5047614611394708"
                         data-ad-slot="5898515821"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script> 
                </div>
              
            <div class="row">
                <!-- Sidebar left -->
                @yield('sidebar-left')
                <!-- End sidebar left -->
                <!-- Content -->
                @yield('content')
                <!-- End Content -->
                <!-- Sidebar right -->
                <div class="ads">
                    
                       <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Footer -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-5047614611394708"
                         data-ad-slot="5739513978"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
              
                @yield('sidebar-right')
            </div>
            <!-- End row -->
    </section>
    <!-- End Main Content -->
    <!-- Footer  -->
    @include('front-end.footer')
    <!-- End footer -->
    <!-- Link script -->

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/1.js')}}"></script>
    @yield('script')
</body>
</html>