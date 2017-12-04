@extends('scaffold-interface.layouts.app')
@section('title','Site Map')
@section('content')
<div class="container">
    <div class="row">{{ $xml }}</div>
    <br>
    @foreach($links as $url)
        {{ $url->loc }}<br>
    @endforeach
</div>
@endsection
