@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show ip
    </h1>
    <br>
    <a href='{!!url("ip")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Ip Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>ip</b> </td>
                <td>{!!$ip->ip!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection