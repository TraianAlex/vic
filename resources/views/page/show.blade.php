@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show page
    </h1>
    <br>
    <a href='{!!url("page")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Page Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>page</b> </td>
                <td>{!!$page->page!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection