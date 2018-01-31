@extends('layouts.app')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation.">
<meta name="keywords" content="website design, web page design, webdesign, web development, mobile, traian alexandru">
<title>Tags Web Development</title>
@endsection
@section('content')
<section style="margin:150px 0 0 0;">
<div class="container">
    <div class="row">
        @isset($links))
            <table>
                @foreach($links as $link)
                    <tr><td><a href="{{url('/tags/'.$cat->name)}}">{{$cat->name}}</a></td>
                        <td>{{$link->description}}</td>
                        <td>@can('edit') <a href="#">Edit</a> @endcan </td>
                    </tr>
                @endforeach
            </table>
        @endisset
    </div>
</div>
</section>
@endsection
