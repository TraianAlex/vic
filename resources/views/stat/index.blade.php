@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">

    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>{{$total_unique_ips}} uniques IPs</th>
            <th>views</th>
            <th>last visit</th>
            <th>info</th>
        </thead>
        <tbody>
            @foreach($ip_unique as $ip => $sum)
                <tr>
                    <td>{{$ip}}</td>
                    <td>{{$sum[0]}}</td>
                    <td>{{$sum[1]}}</td>
                    <td>
                        <a href = '/stat/ip/{{ $ip }}' class = 'viewShow btn btn-warning btn-xs' data-link = '/stat/ip/{{ $ip }}'><i class = 'fa fa-eye'> info</i></a>
                    </td>
                </tr>
            @endforeach
            @if(isset($pagesByIP))
                <tr><td><h3>Info Result</h3></td></tr>
                @foreach ($pagesByIP as $page => $sum)
                    <tr><td>{{ $page }}</td><td>{{ $sum[0] }}</td><td>{{ $sum[1] }}</td></tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <?=$paginate_ip->count_page()?>
    <?=$paginate_ip->render()?>

    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Page</th>
            <th>views</th>
            <th>Last visit</th>
        </thead>
        <tbody>
            @foreach($pages as $page => $sum)
                <tr>
                    <td>{{ $page }}</td>
                    <td>{{ $sum[0] }} times</td>
                    <td>{{ $sum[1] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <?=$paginate_pages->count_page()?>
    <?=$paginate_pages->render()?>

    <h1>Stat Index</h1>
    <a href='{!!url("stat")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>page</th>
            <th>ip</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($stats as $stat)
            <tr>
                <td>{!!$stat->page!!}</td>
                <td>{!!$stat->ip!!}</td>
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
