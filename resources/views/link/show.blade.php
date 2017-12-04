@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show link
    </h1>
    <br>
    <a href='{!!url("link")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Link Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>address</b> </td>
                <td>{!!$link->address!!}</td>
            </tr>
            <tr>
                <td> <b>description</b> </td>
                <td>{!!$link->description!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection