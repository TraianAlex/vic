@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit admin
    </h1>
    <a href="{!!url('admin')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Admin Index</a>
    <br>
    <form method = 'POST' action = '{!! url("admin")!!}/{!!$admin->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$admin->
            name!!}"> 
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input id="email" name = "email" type="text" class="form-control" value="{!!$admin->
            email!!}"> 
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input id="password" name = "password" type="text" class="form-control" value="{!!$admin->
            password!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection