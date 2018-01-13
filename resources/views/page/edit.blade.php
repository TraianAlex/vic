@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit page
    </h1>
    <a href="{!!url('page')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Page Index</a>
    <br>
    <form method = 'POST' action = '{!! url("page")!!}/{!!$page->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="page">page</label>
            <input id="page" name = "page" type="text" class="form-control" value="{!!$page->
            page!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection