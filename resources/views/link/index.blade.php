@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Link Index
    </h1>
    <a href='{!!url("link")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>address</th>
            <th>description</th>
            <th>categories</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($links as $link)
            <tr>
                <td>{!!$link->address!!}</td>
                <td>{!!$link->description!!}</td>
                <td><?php $i = 0;?>
                    @foreach($link->categories as $cat)
                        <?php $i++ ?>
                        {!!$cat->name!!} @if(count($link->categories) > 1 && count($link->categories) > $i) / @endif

                    @endforeach
                </td>
                <td width="15%">
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/link/{!!$link->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/link/{!!$link->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/link/{!!$link->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $links->render() !!}

</section>
@endsection
