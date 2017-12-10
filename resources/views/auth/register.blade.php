@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Build a Mobile Website. Web Development Firm Toronto. Responsive websites. Webdesign and implementation.">
<meta name="keywords" content="website webdesign, web development firm, mobile web design, traian alexandru">
<title>Register {{ config('app.name', 'Vic') }}</title>
@endsection
@section('content')
<section class="mbr-section form1 cid-qDeV5qgZf0" id="form1-3u" data-rv-view="2043">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Register</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5"><a href="{{ url('/auth/login') }}" class="btn btn-light">Login</a></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <form class="mbr-form" action="{{ route('register') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row row-sm-offset">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="form-control-label mbr-fonts-style display-7">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="form-control-label mbr-fonts-style display-7">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="form-control-label mbr-fonts-style display-7">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                        </div>
                        <span class="input-group-btn"><button type="submit" class="btn btn-form btn-warning-outline display-4">Register</button></span>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
