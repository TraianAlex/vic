@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show stat
    </h1>
    <br>
    <a href='{!!url("stat")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Stat Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>page</b> </td>
                <td>{!!$stat->page!!}</td>
            </tr>
            <tr>
                <td> <b>ip</b> </td>
                <td>{!!$stat->ip!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection