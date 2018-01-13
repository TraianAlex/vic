@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit ip
    </h1>
    <a href="{!!url('ip')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Ip Index</a>
    <br>
    <form method = 'POST' action = '{!! url("ip")!!}/{!!$ip->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="ip">ip</label>
            <input id="ip" name = "ip" type="text" class="form-control" value="{!!$ip->
            ip!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection