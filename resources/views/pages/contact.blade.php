@extends('layouts.app')
@section('meta')
<meta name="description" content="Website Development Quote. Responsive mobile websites. Webdesign and implementation.">
<meta name="keywords" content="website, design, webdesign, web, mobile web design, develop a website, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Develop a Website | Traian Alexandru Contact</title>
@endsection
@section('css')
<style type="text/css">.flash{background:#f6624a;color:white;width:260px;position:absolute;right:20px;bottom:20px;padding:1em;display:none;} .temp{position:absolute;right:20px;bottom:-90px;display:none;z-index:50;}</style>
@endsection
@section('content')
@include('pages.headers.contact')
<section class="mbr-section form4 cid-qwnf41fpS8" id="form4-o" data-rv-view="508">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCy9r70T3NYf3PhvVflTo0_zdif2_IoIYs&amp;q=place_id:ChIJEyQW-43S1IkRGaHF739gu6o" allowfullscreen=""></iframe></div>
            </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">Drop a Line</h2>
                <div>
                    <div class="icon-block pb-3">
                        <span class="icon-block__icon">
                            <span class="mbri-letter mbr-iconfont" media-simple="true"></span>
                        </span>
                        <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                            Don't hesitate to contact us
                        </h4>
                    </div>
                    <div class="icon-contacts pb-3">
                        <h5 class="align-left mbr-fonts-style display-7">
                            Ready for offers and cooperation
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: +1 (647) 716 1744&nbsp;<br>
                            Email: <script>let part1 = "info";let part2 = Math.pow(2,6);let part3 = String.fromCharCode(part2);let part4 = "vic.com.ro";let part5 = part1 + String.fromCharCode(part2) + part4;document.write("<a href=" + "mai" + "lto" + ":" + part5 + ">" + part1 + part3 + part4 + "</a>");</script></p>
                    </div>
                </div>
                <div>
                    <form data-email class="block mbr-form" action="{{url('send')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 multi-horizontal">
                                <input type="text" class="form-control input" name="name" placeholder="Your Name" required="">
                            </div>
                            <div class="col-md-12" data-for="email">
                                <input type="email" class="form-control input" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control input" name="message" rows="3" placeholder="Message" style="resize:none"></textarea>
                            </div>
                            <div class="col-md-12">
                                {!! $captcha !!}
                            </div>
                            <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-form btn-warning display-4">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
                <img class="temp" src="{{asset('storage/rotating-ring-loader.gif')}}">
            </div>
        </div>
    </div>
    <div class="flash"></div>
</section>
@endsection
