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
@include('pages.headers.links')
<section class="mbr-section content4 cid-qCYC1i7rk7" id="content4-2x" data-rv-view="203">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">Tags</h2>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section content8 cid-qCYBxwqvnB" id="content8-2w" data-rv-view="205">
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-12">
                <div class="mbr-section-btn align-center">
                  @isset($categories)
                    @foreach($categories as $category)
                        <a class="btn btn-info-outline display-4" href="/tags/{{$category->name}}">{{$category->name}}</a>
                    @endforeach
                  @endisset
                  @unless(count($categories))
                    <a class="btn btn-info-outline display-4" href="#">No tags</a>
                  @endunless
                </div>
            </div>
        </div>
    </div>
</section>
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
@include('pages.partials.disqus')
@include('pages.partials.share')
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
