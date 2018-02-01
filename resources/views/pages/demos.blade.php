@extends('layouts.app')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<title>Demos</title>
@section('css')
<style type="text/css">
.clock-circle {
  width: 180px;
  height: 180px;
  margin: 0 auto;
  position: relative;
  border: 8px solid #fff;
  border-radius: 50%;
  -webkit-box-shadow: 0 1px 8px rgba(34, 34, 34, 0.3),inset 0 1px 8px rgba(34, 34, 34, 0.3);
  box-shadow: 0 1px 8px rgba(34, 34, 34, 0.3),inset 0 1px 8px rgba(34, 34, 34, 0.3);
  background: #4527A0;
}
.clock-face {
  width: 100%;
  height: 100%;
}
.clock-hour{
  width:0;
  height:0;
  position:absolute;
  top:50%;
  left:50%;
  margin:-4px 0 -4px -25%;
  padding:4px 0 4px 25%;
  background:#fff;
  -webkit-transform-origin:100% 50%;
  -ms-transform-origin:100% 50%;
  transform-origin:100% 50%;
  border-radius:4px 0 0 4px;
}
.clock-minute{
  width:0;
  height:0;
  position:absolute;
  top:50%;
  left:50%;
  margin:-40% -3px 0;
  padding:40% 3px 0;
  background:#fff;
  -webkit-transform-origin:50% 100%;
  -ms-transform-origin:50% 100%;
  transform-origin:50% 100%;
  border-radius:3px 3px 0 0;
}
.clock-second{
  width:0;
  height:0;
  position:absolute;
  top:50%;
  left:50%;
  margin:-40% -1px 0 0;
  padding:40% 1px 0;
  background:#fff;
  -webkit-transform-origin:50% 100%;
  -ms-transform-origin:50% 100%;
  transform-origin:50% 100%;
}
.clock-face:after {
    position:absolute;
    top:50%;
    left:50%;
    width:12px;
    height:12px;
    margin:-6px 0 0 -6px;
    background:#fff;
    border-radius:6px;
    content:"";
    display:block;
}
</style>
@endsection
@endsection
@section('content')
@include('pages.headers.auth')
<section class="features17 cid-qDwjWzyA5p" id="features17-47" data-rv-view="653">
    <div class="container-fluid">
        <div class="media-container-row">
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <a href="https://blog.vic.com.ro" target="_blank"><img src="assets/images/blog-s-640x425.jpg" alt="Blog Traian" title="Blog Traian" media-simple="true"></a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Blog</h4>
                        <p class="mbr-text mbr-fonts-style display-7">A simple blog with control panel</p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <a href="https://chatty.vic.com.ro" target="_blank"><img src="assets/images/mbr-1626x1080.jpg" alt="Traian" title="Traian" media-simple="true"></a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Social</h4>
                        <p class="mbr-text mbr-fonts-style display-7">friends, likes, comments</p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <a href="https://vic.com.ro"><img src="assets/images/03.jpg" alt="Traian" title="Traian" media-simple="true"></a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Lorem</h4>
                        <p class="mbr-text mbr-fonts-style display-7">lorem</p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <a href="https://vic.com.ro"><img src="assets/images/04.jpg" alt="Traian" title="Traian" media-simple="true"></a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Lorem</h4>
                        <p class="mbr-text mbr-fonts-style display-7">lorem</p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <a href="/draw"><img src="assets/images/01.jpg" alt="Traian" title="Traian" media-simple="true"></a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Draw</h4>
                        <p class="mbr-text mbr-fonts-style display-7"></p><p>on squares</p><p></p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <a href="https://dev.vic.com.ro" target="_blank"><img src="assets/images/02.jpg" alt="Traian" title="Traian" media-simple="true"></a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Angular</h4>
                        <p class="mbr-text mbr-fonts-style display-7">Shopping list<br>backend Laravel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
<div style="background-color: #673AB7;padding: 10px 0 10px 0;">
    <div class="clock-circle">
      <div class="clock-face">
       <div id="hour" class="clock-hour"></div>
       <div id="minute" class="clock-minute"></div>
       <div id="second" class="clock-second"></div>
      </div>
    </div>
</div>
</section>
@include('pages.partials.under-construction')
@endsection
@section('script')
<script src="assets/countdown/jquery.countdown.min.js" defer data-turbolinks-track="reload"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script defer data-turbolinks-eval="false" data-turbolinks-track="reload">
function analogClock(){}
analogClock.prototype.run = function () {
    var date = new Date();
    var second = date.getSeconds() * 6;
    var minute = date.getMinutes() * 6 + second / 60;
    var hour = ((date.getHours() % 12) / 12) * 360 + 90 + minute / 12;
    jQuery('#hour').css("transform", "rotate(" + hour + "deg)");
    jQuery('#minute').css("transform", "rotate(" + minute + "deg)");
    jQuery('#second').css("transform", "rotate(" + second + "deg)");
};
jQuery(document).ready(function(){
    var analogclock = new analogClock();
    window.setInterval(function(){
    analogclock.run();
    }, 1000);
});
</script>
@endsection
