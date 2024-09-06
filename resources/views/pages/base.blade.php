<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154743048-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-154743048-1');
    </script>
    <!-- Hotjar Tracking Code for https://www.laboratoriocortezmoreira.com.br/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1617732,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image" content="{{ asset('theme/imagens/logo_sm.png') }}">
    <meta property="og:description" content="Laboratório Cortez Moreira desde 1975 cuidando de famílias!"/>
    <meta property="og:url" content="http://www.laboratoriocortezmoreira.com.br">
    <meta name="author" content="Like Publicidade">
    @yield('metatags')

    <!-- Title page -->
    <title>Laboratório Cortez Moreira</title>
    <meta name=”description” content="Laboratório Cortez Moreira desde 1975 cuidando de famílias!">
    <link rel="shortcut icon" href="{{ asset('theme/imagens/favicon.ico') }}">
    <meta name="_token" content="{{csrf_token()}}" />

    <!-- Fonts, Animations e Grid -->
    <link rel="stylesheet" href="{{ asset('theme/css/lib/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/fonts/fonts.css') }}">

    <!-- styles sheets -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/libs.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/footer.css') }}">
    @yield('stylesheet')

    <!-- JS Library's -->
    <script src="{{ asset('theme/js/lib/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/js/lib/showFadeUp.js') }}" charset="utf-8"></script>

  </head>
  <body>
    <!-- @include('pages.partials._loader') -->

    @yield('body')

    @yield('script')

  </body>
</html>
