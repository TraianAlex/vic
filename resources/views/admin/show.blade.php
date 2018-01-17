@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show admin
    </h1>
    <br>
    <a href='{!!url("admin")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Admin Index</a>
    <a href='{!!url("admin/notifications", ['id' => $admin->id])!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Notifications</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>name</b> </td>
                <td>{!!$admin->name!!}</td>
            </tr>
            <tr>
                <td> <b>email</b> </td>
                <td>{!!$admin->email!!}</td>
            </tr>
            <tr>
                <td> <b>password</b> </td>
                <td>{!!$admin->password!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection
