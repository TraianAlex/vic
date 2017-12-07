@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit link
    </h1>
    <a href="{!!url('link')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Link Index</a>
    <br>
    {{-- <form method = 'POST' action = '{!! url("link")!!}/{!!$link->id!!}/update'> --}}
    {!! Form::model($link, ['method' => 'PATCH', 'url' => url('link/'.$link->id)]) !!}
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="address">address</label>
            <input id="address" name = "address" type="text" class="form-control" value="{!!$link->
            address!!}">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input id="description" name = "description" type="text" class="form-control" value="{!!$link->
            description!!}">
        </div>
        <div class="form-group">
            {!! Form::label('cat_list', 'Categories:', ['class' => "control-label"]) !!}
            {!! Form::select('categories_list[]', $categories, null, ['id' => 'cat_list', 'class' => 'form-control', 'multiple']) !!}
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>

@endsection
@section('js')
<script type="text/javascript">
    $('#cat_list').select2({
        placeholder: 'Choose a category',
        //tags: true,
        //ajax: {
        //  dataType: 'json',//or only //
        //  url: 'api/tags',//tags.json look in public folder
        //  delay: 250,
        //  data: function(params){
        //      return {
        //          q: params.term
        //      }
        //  },
        //  processResults: function(data){//
        //      return { results: data }
        //  }
        //}
    });
</script>
@endsection
