@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create notification
    </h1>
    <a href="{!!url('notification')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Notification Index</a>
    <br>
    <form method = 'POST' action = '{!!url("notification")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="type">type</label>
            <input id="type" name = "type" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="notifiable_type">notifiable type</label>
            <input id="notifiable_type" name = "notifiable_type" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="notifiable_id">notifiable id</label>
            <input id="notifiable_id" name = "notifiable_id" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="data">data</label>
            <input id="data" name = "data" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="read_at">read_at</label>
            <input id="read_at" name = "read_at" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection
