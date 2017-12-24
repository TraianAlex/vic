@extends('layouts.app')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<title>Demos</title>
@endsection
@section('content')

<section class="mbr-section content8 cid-qDhLd7Iq7B" id="content8-45" data-rv-view="294">
    @if(auth()->guest())
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8 offset-10">
                <div class="mbr-section-btn align-center"><a class="btn btn-warning display-4" href="{{ url('/auth/login') }}">Login</a>
                    <a class="btn btn-primary display-4" href="{{ url('/auth/register') }}">Register</a></div>
            </div>
        </div>
    </div>
    @endif
</section>

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
                        <a href="https://vic.com.ro"><img src="assets/images/02.jpg" alt="Traian" title="Traian" media-simple="true"></a>
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
                        <a href="https://vic.com.ro"><img src="assets/images/01.jpg" alt="Traian" title="Traian" media-simple="true"></a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">Lorem</h4>
                        <p class="mbr-text mbr-fonts-style display-7"></p><p>lorem</p><p></p>
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
                        <p class="mbr-text mbr-fonts-style display-7">Shopping List<br>backend Laravel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="countdown1 cid-qD2j4EI7zO" id="countdown1-3c" data-rv-view="308">
    <div class="container ">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">Under Construction</h2>
        <h3 class="mbr-section-subtitle align-center mbr-fonts-style display-5">I'll be back soon</h3>
    </div>
    <div class="container countdown-cont align-center">
        <div class="daysCountdown" title="Days"></div>
        <div class="hoursCountdown" title="Hours"></div>
        <div class="minutesCountdown" title="Minutes"></div>
        <div class="secondsCountdown" title="Seconds"></div>
        <div class="countdown pt-5 mt-2" data-due-date="2018/01/15">
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="assets/countdown/jquery.countdown.min.js"></script>
@endsection
