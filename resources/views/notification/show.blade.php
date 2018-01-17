@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>Show notification</h1>
    <br>
    <a href='{!!url("notification")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Notification Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>type</b> </td>
                <td>{!!$notification->type!!}</td>
            </tr>
            <tr>
                <td> <b>notifiable</b> </td>
                <td>{!!$notification->notifiable_type!!}</td>
            </tr>
            <tr>
                <td> <b>notifiable</b> </td>
                <td>{!!$notification->notifiable_id!!}</td>
            </tr>
            <tr>
                <td> <b>data</b> </td>
                <td>{!!$notification->data!!}</td>
            </tr>
            <tr>
                <td> <b>read_at</b> </td>
                <td>{!!$notification->read_at!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection
