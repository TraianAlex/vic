@extends('layouts.app')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Web development links.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Links Web Development</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/facebook-plugin/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/datatables/data-tables.bootstrap4.min.css')}}">
@endsection
@section('content')
@includeWhen(request()->segment(1) == 'links', 'pages.headers.links')
@includeWhen(request()->segment(1) == 'links', 'pages.headers.categories')
<section class="section-table cid-qCYF3quygR" id="table1-34" data-rv-view="236">
  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Links</h2>
      <div class="table-wrapper">
        <div class="container">
          <div class="row search">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="dataTables_filter">
                  <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                  <input class="form-control input-sm" disabled="">
                </div>
            </div>
          </div>
        </div>
        <div class="container scroll">
          <table class="table isSearch" cellspacing="0">
            <thead>
              <tr class="table-heads ">
              <th class="head-item mbr-fonts-style display-7">Address</th><th class="head-item mbr-fonts-style display-7">Description</th><th class="head-item mbr-fonts-style display-7">Tag</th></tr>
            </thead>
            <tbody>
              @isset($links)
                @each('pages.partials.link', $links, 'link')
              @endisset
              @unless(count($links))
                <tr><td colspan='3' class="body-item mbr-fonts-style display-7"><a href="#" class="text-black">Temporary there are no links here</a></td></tr>
              @endunless
            </tbody>
          </table>
          {!! $links->render() !!}
        </div>
        <div class="container table-info-container">
          <div class="row info">
            <div class="col-md-6">
              <div class="dataTables_info mbr-fonts-style display-7">
                <span class="infoBefore">Showing</span>
                <span class="inactive infoRows"></span>
                <span class="infoAfter">entries</span>
                <span class="infoFilteredBefore">(filtered from</span>
                <span class="inactive infoRows"></span>
                <span class="infoFilteredAfter">total entries)</span>
              </div>
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </div>
</section>
@includeWhen(request()->segment(1) != 'links', 'pages.partials.back-links')
@includeWhen(request()->segment(1) == 'links', 'pages.partials.disqus')
@includeWhen(request()->segment(1) == 'links', 'pages.partials.share')
@endsection
@section('script')
<script src="http://w.sharethis.com/button/sharethis.js#publisher=1bd5e691-454c-4f90-8a6b-12d6923db08e&type=website&post_services=twitter%2Cfacebook%2Cemail%2Cgbuzz%2Cmyspace&button=false" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script data-turbolinks-eval="false">
    var shared_object = SHARETHIS.addEntry({
        title: document.title,
        url: document.location.href
    });
    shared_object.attachButton(document.getElementById("ck_sharethis"));
    shared_object.attachChicklet("facebook", document.getElementById("ck_facebook"));
    shared_object.attachChicklet("twitter", document.getElementById("ck_twitter"));
    shared_object.attachChick;
</script>
<script src="{{asset('assets/facebook-plugin/facebook-script.js')}}" defer data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{asset('assets/datatables/jquery.data-tables.min.js')}}" defer data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{asset('assets/datatables/data-tables.bootstrap4.min.js')}}" defer data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
@endsection
