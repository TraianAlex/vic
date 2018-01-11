@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <a href='{!!url("stat")!!}' class = 'btn btn-success'><i class="fa fa-rss"></i> Back</a>
    <a href='{!!url("stat")!!}/pages' class = 'btn btn-success'><i class="fa fa-rss"></i> Pages</a>
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
                        <a href = '/stat/{{ $ip }}/deleteIp' class = 'delete btn btn-danger btn-xs'><i class = 'fa fa-trash'> delete</i></a>
                        <a href = '/stat/ips/{{ $ip }}' class = 'viewShow btn btn-warning btn-xs' data-link = '/stat/ips/{{ $ip }}'><i class = 'fa fa-eye'> info</i></a>
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
    <?=$paginate_ip->render($request)?>
</section>
@endsection
