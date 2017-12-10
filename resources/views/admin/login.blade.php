@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Build a Mobile Website. Web Development Firm Toronto. Responsive websites. Webdesign and implementation.">
<meta name="keywords" content="website webdesign, web development firm, mobile web design, traian alexandru">
<title>Login {{ config('app.name', 'Vic') }}</title>
@endsection
@section('content')
<section class="mbr-section form1 cid-qDeIxCErZP" id="form1-3m" data-rv-view="1221">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Login</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-md-10">
                <form class="mbr-form" method="post" action="{{ route('login.admin') }}">
                    {{ csrf_field() }}
                    @if(Session::has('fail'))
                        <section class="info-box fail">
                            {{ Session::get('fail') }}
                        </section>
                    @endif
                    <div class="row row-sm-offset">
                        <div class="col-md-10">
                            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-sm-3 col-form-label mbr-fonts-style display-7">Username</label>
                                <input type="name" class="form-control col-sm-9" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-sm-3 col-form-label mbr-fonts-style display-7">Password</label>
                                <input type="password" class="form-control col-sm-9" name="password" required="">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn"><button type="submit" class="btn btn-form btn-warning-outline display-4">Login</button></span>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
