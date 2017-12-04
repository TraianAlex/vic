@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit link
    </h1>
    <a href="{!!url('link')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Link Index</a>
    <br>
    <form method = 'POST' action = '{!! url("link")!!}/{!!$link->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="address">address</label>
            <input id="address" name = "address" type="text" class="form-control" value="{!!$link->
            address!!}"> 
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input id="description" name = "description" type="text" class="form-control" value="{!!$link->
            description!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection