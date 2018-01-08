@extends('layouts.app')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Web development links.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<title>Links results</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/datatables/data-tables.bootstrap4.min.css')}}">
@endsection
@section('content')
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
              @foreach($links as $link)
              <tr>
                <td class="body-item mbr-fonts-style display-7"><a href="{{url('/links/'.$link->id)}}" target="_blank" class="text-black">{{$link->address}}</a> <span style="font-size:14px">(v:{{$link->visits}})</td>
                <td class="body-item mbr-fonts-style display-7">{{$link->description}}</td>
                <td class="body-item mbr-fonts-style display-7"><?php $i = 0; ?>
                    @foreach($link->categories as $cat)
                        <?php $i++ ?>
                        <a href="{{url('/tags/'.$cat->name)}}" class="text-black">{{$cat->name}}</a>
                        @if(count($link->categories) > 1 && count($link->categories) > $i) / @endif
                    @endforeach
                </td>
              </tr>
            @endforeach
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
<section class="mbr-section content8 cid-qD39chLMuH" id="content8-3d" data-rv-view="1245">
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center"><a class="btn btn-info display-4" href="/links"><span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>Back</a></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="{{asset('assets/datatables/jquery.data-tables.min.js')}}"></script>
<script src="{{asset('assets/datatables/data-tables.bootstrap4.min.js')}}"></script>
@endsection
