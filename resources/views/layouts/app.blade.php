<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://vic.com.ro"/>
    <link rel="shortcut icon" href="{{asset('assets/images/traian-s-640x426.jpg')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" data-turbolinks-track="reload">
    <link href="{{ mix('css/all.css') }}" rel="stylesheet" data-turbolinks-track="reload">
    @yield('css')
    <style type="text/css">
    .turbolinks-progress-bar {visibility: hidden;}
    .notify-hide{display: none;}
      @media (min-width: 991px) {.notifications-menu{display: none;}}
    </style>
    <!-- Google Analytics -->
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-63781170-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());
  gtag('config', 'UA-63781170-2');
</script>
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1461897,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</head>
<body>
    <div id="app">
        @include('partials.vicnav')

        @yield('content')

        @include('partials.footer')
    </div>
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;" href="#menu2-1m"><i class="mbri-down mbr-iconfont"></i></a></div>
    <input name="animation" type="hidden">
  <script src="{{ asset('js/turbolinks.js') }}" defer></script>
  <script src="{{ mix('js/all.js') }}" defer data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
  <script src="{{ mix('js/app.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
  <script defer data-turbolinks-eval="false" data-turbolinks-track="reload">
    function showMessage(message) {
      if (!("Notification" in window)) {
        // Code to run if notifications are not
        // supported by the visitor's browser
      } else {
        if (Notification.permission === "granted") {
          var notification = new Notification(message);
        } else if (Notification.permission !== "denied") {
          Notification.requestPermission().then(function (permission) {
            if (permission === "granted") {
              var notification = new Notification(message);
            }
      });
        }
      }
    }
  </script>
  @yield('script')
  <script defer data-turbolinks-eval="false" data-turbolinks-track="reload">
  (function(){
      var submitAjaxRequest = function(e){
          $('.temp').show();
          var form = $(this);
          var method = form.find('input[name="_method"]').val() || 'POST';
          $.ajax({
              type: method,
              url: form.prop('action'),
              data: form.serialize(),
              success: function(response){
                  $('.temp').hide();
                  $('.flash').text(response).fadeIn(500).delay(5000).fadeOut(500);
                  $('form[data-email]')[0].reset();
              }
          });
          e.preventDefault();
      }
      $('form[data-email]').on('submit', submitAjaxRequest);
  })();
</script>
</body>
</html>
