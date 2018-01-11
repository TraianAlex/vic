@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <a href='{!!url("stat")!!}/ips' class = 'btn btn-success'><i class="fa fa-rss"></i> IPs</a>
    <a href='{!!url("stat")!!}/pages' class = 'btn btn-success'><i class="fa fa-rss"></i> Pages</a>

    <h1>Stat Index</h1>
    <a href='{!!url("stat")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>page</th>
            <th>ip</th>
            <th>when</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($stats as $stat)
            <tr>
                <td>{!!$stat->page!!}</td>
                <td>{!!$stat->ip!!}</td>
                <td>{!!$stat->created_at->diffForHumans()!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/stat/{!!$stat->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/stat/{!!$stat->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/stat/{!!$stat->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $stats->render() !!}

</section>
@endsection
