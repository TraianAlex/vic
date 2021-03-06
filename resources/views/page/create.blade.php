@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create page
    </h1>
    <a href="{!!url('page')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Page Index</a>
    <br>
    <form method = 'POST' action = '{!!url("page")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="page">page</label>
            <input id="page" name = "page" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection