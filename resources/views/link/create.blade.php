@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create link
    </h1>
    <a href="{!!url('link')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Link Index</a>
    <br>
    <form method = 'POST' action = '{!!url("link")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="address">address</label>
            <input id="address" name = "address" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input id="description" name = "description" type="text" class="form-control">
        </div>
        <div class="form-group">
            {!! Form::label('cat_list', 'Categories', ['class' => "control-label"]) !!}
            {!! Form::select('cat_list[]', $categories, null, ['id' => 'cat_list', 'class' => 'form-control', 'multiple']) !!}
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection
@section('js')
<script type="text/javascript">
    $('#cat_list').select2({
        placeholder: 'Choose a category',
    });
</script>
@endsection
