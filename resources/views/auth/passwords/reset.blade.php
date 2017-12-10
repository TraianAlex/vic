@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Build a Mobile Website. Web Development Firm Toronto. Responsive websites. Webdesign and implementation.">
<meta name="keywords" content="website webdesign, web development firm, mobile web design, traian alexandru">
<title>Reset Password {{ config('app.name', 'Vic') }}</title>
@endsection
@section('content')
<section class="mbr-section form1 cid-qDfh6xryES" id="form1-43" data-rv-view="3665">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Reset Password</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">@if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-md-10" data-form-type="formoid">
                    <form class="mbr-form" action="{{ route('password.request') }} method="post" >
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row row-sm-offset">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-form-label mbr-fonts-style display-7">E-Mail Address</label>
                                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-form-label mbr-fonts-style display-7">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label class="col-form-label mbr-fonts-style display-7">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <span class="input-group-btn"><button type="submit" class="btn btn-form btn-info display-4">Reset Password</button></span>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
