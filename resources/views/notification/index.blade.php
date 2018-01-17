@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Notification Index
    </h1>
    <a href='{!!url("notification")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>type</th>
            <th>notifiable_type</th>
            <th>notifiable_id</th>
            <th>data</th>
            <th>read_at</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
            <tr>
                <td>{!!$notification->type!!}</td>
                <td>{!!$notification->notifiable_type!!}</td>
                <td>{!!$notification->notifiable_id!!}</td>
                <td>{!!$notification->data!!}</td>
                <td>{!!$notification->read_at!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/notification/{!!$notification->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/notification/{!!$notification->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/notification/{!!$notification->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $notifications->render() !!}

</section>
@endsection
