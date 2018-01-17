@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>Show admin notifications</h1>
    <br>
    <a href='{!!url("admin")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Admin Index</a>
    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/admin/{!!$admin->id!!}'><i class = 'fa fa-eye'> info</i></a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>notification type</th>
            <th>data</th>
            <th>read</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach ($admin->notifications as $notification)
            <tr>
                @include('notification.'.snake_case(class_basename($notification->type)))
                <td>
                    @if($notification->read_at == null))
                        <form method="POST" action="/admin/notifications/{{ $admin->id }}">{{ method_field('DELETE') }} {{ csrf_field() }}
                            <button class = 'delete btn btn-danger btn-xs' type="submit">Mark As Read</button>
                        </form>
                    @else
                      <i class="fa fa-check"></i>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</section>
@endsection
