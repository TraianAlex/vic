@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Page Index
    </h1>
    <a href='{!!url("page")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>page</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($pages as $page) 
            <tr>
                <td>{!!$page->page!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/page/{!!$page->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/page/{!!$page->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/page/{!!$page->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $pages->render() !!}

</section>
@endsection