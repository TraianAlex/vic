@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit stat
    </h1>
    <a href="{!!url('stat')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Stat Index</a>
    <br>
    <form method = 'POST' action = '{!! url("stat")!!}/{!!$stat->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="page">page</label>
            <input id="page" name = "page" type="text" class="form-control" value="{!!$stat->
            page!!}"> 
        </div>
        <div class="form-group">
            <label for="ip">ip</label>
            <input id="ip" name = "ip" type="text" class="form-control" value="{!!$stat->
            ip!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection