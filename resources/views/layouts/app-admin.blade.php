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
    <link href="{{ mix('css/all.css') }}" rel="stylesheet" data-turbolinks-track="reload">
    @yield('css')
    <style type="text/css">
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
</head>
<body>
	<div id="app">
		@include('partials.vicnav')

		@yield('content')
    @include('flash::message')
		@include('partials.footer')
	</div>
  <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbri-down mbr-iconfont"></i></a></div>
    <input name="animation" type="hidden">
  <script src="{{ asset('js/turbolinks.js') }}" defer></script>
	<script src="{{ mix('js/all.js') }}" defer data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script data-turbolinks-eval="false">
      function blinker() {
        $('.blinking').fadeOut(500);
        $('.blinking').fadeIn(500);
      }
      setInterval(blinker, 1000);

    Pusher.logToConsole = true;
    var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
      encrypted: true
    });
    var channel = pusher.subscribe('test-channel');
    channel.bind('App\\Events\\LinkCreated', function(data) {
      $('.navbar-expand-lg').removeClass('notify-hide').addClass('notifications-menu');
      $('.fa').removeClass('fa-bell-o').addClass('fa-bell blinking');
      $('.notification-menu').append(
        '<a class="text-black dropdown-item display-4" href="#" aria-expanded="false">\
          <i class="fa fa-users text-aqua"></i> '+data.message+'\
        </a>'
      );
    });

      setTimeout(function(){
          var data = { message: 'test notification' };
          $('.navbar-expand-lg').removeClass('notify-hide').addClass('notifications-menu');
          $('.fa').removeClass('fa-bell-o').addClass('fa-bell blinking');
          $('.notification-menu').append(
          '<a class="text-black dropdown-item display-4" href="#" aria-expanded="false">\
            <i class="fa fa-users text-aqua"></i> '+data.message+'</a>');
          }, 60000);
    </script>
  	@yield('script')
    <!--script src="{{-- asset('js/app.js') --}}"></script-->
    <script type="text/javascript">
      $('#flash-overlay-modal').modal();
    </script>
</body>
</html>
