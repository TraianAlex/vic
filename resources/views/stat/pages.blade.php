@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <a href='{!!url("stat")!!}/ips' class = 'btn btn-success'><i class="fa fa-rss"></i> IPs</a>
    <a href='{!!url("stat")!!}' class = 'btn btn-success'><i class="fa fa-rss"></i> Back</a>

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
    <?=$paginate_pages->render($request)?>

</section>
@endsection
