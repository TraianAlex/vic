@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create ip
    </h1>
    <a href="{!!url('ip')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Ip Index</a>
    <br>
    <form method = 'POST' action = '{!!url("ip")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="ip">ip</label>
            <input id="ip" name = "ip" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection