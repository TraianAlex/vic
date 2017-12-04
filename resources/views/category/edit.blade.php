@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit category
    </h1>
    <a href="{!!url('category')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Category Index</a>
    <br>
    <form method = 'POST' action = '{!! url("category")!!}/{!!$category->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$category->
            name!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection