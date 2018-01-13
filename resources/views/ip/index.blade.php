@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>{{$ipss->count()}} uniques ips</th>
            <th>views</th>
            <th>last visit</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($ipss as $ip)
            <tr>
                <td>{!!$ip->ip!!}</td>
                <td>{{$ip->pages->count()}}</td>
                <td>{!!$ip->created_at->diffForHumans()!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/ip/{!!$ip->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '/stat/ip/{!!$ip->id!!}' class = 'viewShow btn btn-warning btn-xs' data-link = '/stat/ip/{!!$ip->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach
             @if(isset($pagesByIP))
                <tr><td><h3>Info Result</h3></td></tr>
                @foreach ($pagesByIP->pages->unique('page') as $page)
                    <tr><td>{{ $page->page }}</td>
                        <td>{{ $page->ips->count() }}</td>
                        <td>{{ $page->pivot->created_at->diffForHumans() }}</td></tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{-- {!! $ipss->render() !!} --}}

    <h1>Pages</h1>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>pages</th>
            <th>views</th>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr>
                <td>{!!$page->page!!}</td>
                <td>{{$page->ips->count()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $pages->render() !!} --}}

    <h1>
        Ip Index
    </h1>
    <a href='{!!url("ip")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>ip</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($ips as $ip)
            <tr>
                <td>{!!$ip->ip!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/ip/{!!$ip->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/ip/{!!$ip->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/ip/{!!$ip->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ips->render() !!}

</section>
@endsection
