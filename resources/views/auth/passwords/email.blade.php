@extends('layouts.app-admin')
@section('meta')
<meta name="description" content="Build a Mobile Website. Web Development Firm Toronto. Responsive websites. Webdesign and implementation.">
<meta name="keywords" content="website webdesign, web development firm, mobile web design, traian alexandru">
<title>Passsword {{ config('app.name', 'Vic') }}</title>
@endsection
@section('content')
<section class="mbr-section form1 cid-qDfeh2U62q" id="form1-41" data-rv-view="3637">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Reset Password</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isset($errors) && count($errors) > 0)
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
            <div class="media-container-column col-lg-8">
                <form class="mbr-form" action="{{ url('/password/email') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row row-sm-offset">
                        <div class="col-md-4 multi-horizontal">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="form-control-label mbr-fonts-style display-7">E-Mail Address</label>
                                <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn"><button type="submit" class="btn btn-form btn-info display-4">Send Password Reset Link</button></span>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
