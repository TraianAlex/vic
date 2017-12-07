@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show link
    </h1>
    <br>
    <a href='{!!url("link")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Link Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>address</b> </td>
                <td>{!!$link->address!!}</td>
            </tr>
            <tr>
                <td> <b>description</b> </td>
                <td>{!!$link->description!!}</td>
            </tr>
            @unless($link->categories->isEmpty())
                <tr>
                    <td> <b>categories</b> </td>
                    <td><?php $i = 0; ?>
                        @foreach($link->categories as $cat)
                            <?php $i++ ?>
                            {!!$cat->name!!} @if(count($link->categories) > 1 && count($link->categories) > $i) / @endif
                        @endforeach
                    </td>
                </tr>
            @endunless
        </tbody>
    </table>
</section>
@endsection
