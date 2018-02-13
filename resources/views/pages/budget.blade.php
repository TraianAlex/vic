@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation. Javascript samples.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<meta name="turbolinks-visit-control" content="reload">
<title>Simple Budget</title>
@endsection
@section('content')
@include('pages.headers.js')
<section class="tabs3 cid-qChX6HeGZH" id="tabs3-2u" data-rv-view="200" style="background-color: transparent;margin-top: -70px;">
<div class="container-fluid">
    <div class="row tabcont">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item mbr-fonts-style"><a class="nav-link active display-7" role="tab" data-toggle="tab" href="#tabs3-2u_tab0" aria-expanded="true">Expenses</a></li>
            <li class="nav-item mbr-fonts-style"><a class="nav-link  active display-7" role="tab" data-toggle="tab" href="#tabs3-2u_tab1" aria-expanded="true">Income</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="mbr-section-btn align-center">
      <span class="btn btn-info-outline display-4" style="border-radius: 50px;">Income&nbsp;<span class="total-cad-inc">0</span></span>
      <span class="btn btn-info-outline display-4" style="border-radius: 50px;">Expenses&nbsp;<span class="total-cad">0</span></span>
      <span class="btn btn-info-outline display-4" style="border-radius: 50px;">Left over&nbsp;<span class="total-cad-diff">0</span></span>
    </div>
</div>
<div class="container">
    <div class="row px-1">
        <div class="tab-content">
            <div id="tab1" class="tab-pane in active mbr-table" role="tabpanel">
                <div class="row tab-content-row">
                   <div class="card">
                        <div class="card-content">
                          <form class="mbr-form">
                            <div class="row justify-content-center">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Add Expense Description" id="item-name">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Add Amount" id="item-cad">
                                </div>
                              </div>
                              <span class="input-group-btn mr-2"><button class="add-btn btn btn-primary mb-2"><i class="fa fa-plus"></i> Add Expense</button></span>
                              <span class="input-group-btn mr-2"><button class="update-btn btn btn-secondary"><i class="fa fa-pencil-square-o"></i> Update</button></span>
                              <span class="input-group-btn mr-2"><button class="delete-btn btn btn-warning"><i class="fa fa-remove"></i> Delete</button></span>
                              <span class="input-group-btn mr-2"><button class="clear-btn btn btn-danger"><i class="fa fa-remove"></i> Clear All</button></span>
                              <span class="input-group-btn mr-2"><button class="back-btn btn btn-info"><i class="fa fa-chevron-circle-left"></i> Back</button></span>
                            </div>
                          </form>
                        </div>
                      </div>
                      <ul id="item-list" class="list-group">
                      </ul>
                </div>
            </div>
            <div id="tab2" class="tab-pane  mbr-table" role="tabpanel">
                <div class="row tab-content-row">
                  <div class="card">
                      <div class="card-content">
                        <form class="mbr-form">
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Add Income Description" id="item-name-inc">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Add Amount" id="item-cad-inc">
                              </div>
                            </div>
                            <span class="input-group-btn mr-2"><button class="add-btn-inc btn btn-primary mb-2"><i class="fa fa-plus"></i> Add Income</button></span>
                            <span class="input-group-btn mr-2"><button class="update-btn-inc btn btn-secondary"><i class="fa fa-pencil-square-o"></i> Update Income</button></span>
                            <span class="input-group-btn mr-2"><button class="delete-btn-inc btn btn-warning"><i class="fa fa-remove"></i> Delete Income</button></span>
                            <span class="input-group-btn mr-2"><button class="clear-btn-inc btn btn-danger"><i class="fa fa-remove"></i> Clear All</button></span>
                            <span class="input-group-btn mr-2"><button class="back-btn-inc btn btn-info"><i class="fa fa-chevron-circle-left"></i> Back</button></span>
                          </div>
                        </form>
                      </div>
                    </div>
                    <ul id="item-list-inc" class="list-group">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@include('pages.partials.get-code-btn', ['segment' => request()->segment(1)])
@endsection
@section('script')
<script src="{{ asset('js/budget/storage.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{ asset('js/budget/item.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{ asset('js/budget/item-inc.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{ asset('js/budget/ui.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{ asset('js/budget/ui-inc.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{ asset('js/budget/inc.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script src="{{ asset('js/budget/exp.js') }}" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
@endsection
