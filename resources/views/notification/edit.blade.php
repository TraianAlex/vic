@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit notification
    </h1>
    <a href="{!!url('notification')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Notification Index</a>
    <br>
    <form method = 'POST' action = '{!! url("notification")!!}/{!!$notification->
        id!!}/update'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="type">type</label>
            <input id="type" name = "type" type="text" class="form-control" value="{!!$notification->
            type!!}">
        </div>
        <div class="form-group">
            <label for="notifiable_type">notifiable type</label>
            <input id="notifiable_type" name = "notifiable_type" type="text" class="form-control" value="{!!$notification->
            notifiable_type!!}">
        </div>
        <div class="form-group">
            <label for="notifiable">notifiable id</label>
            <input id="notifiable_id" name = "notifiable_id" type="text" class="form-control" value="{!!$notification->
            notifiable_id!!}">
        </div>
        <div class="form-group">
            <label for="data">data</label>
            <input id="data" name = "data" type="text" class="form-control" value="{!!$notification->
            data!!}">
        </div>
        <div class="form-group">
            <label for="read_at">read_at</label>
            <input id="read_at" name = "read_at" type="text" class="form-control" value="{!!$notification->
            read_at!!}">
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection
