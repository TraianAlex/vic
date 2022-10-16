@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>{{$ipss->count()}} uniques ips</th>
            <th>views</th>
            <th>last visit</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($ipss as $ip)
            <tr>
                <td>{!!$ip->ip!!}</td>
                <td>{{$ip->pages->count()}}</td>
                <td>{!!$ip->created_at->diffForHumans()!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/ip/{!!$ip->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '/stat/ip/{!!$ip->id!!}' class = 'viewShow btn btn-warning btn-xs' data-link = '/stat/ip/{!!$ip->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ipss->render() !!}

 @if(isset($pagesByIP) && !empty($pagesByIP)))
 <h2>Info results</h2>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>page</th>
            <th>views</th>
            <th>last visit</th>
        </thead>
        <tbody>
            @foreach($pagesByIP->pages->unique('page') as $page)
            <tr>
                <td>{!!$page->page!!}</td>
                <td>{{$page->ips->count()}}</td>
                <td>{!!$page->pivot->created_at->diffForHumans()!!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $pagesByIP->render() !!} --}}
 @endif

    <h1>Ip Index</h1>
    <a href='{!!url("ip")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <a class="btn btn-success js-delete-page"><i class="fa fa-trash font-size-20"></i> Delete</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover data-table" style = 'background:#fff'>
        <thead>
            <th>
                <input id="checkbox-all" type="checkbox">
            </th>
            <th>ip</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($ips as $ip)
            <tr id="{!!$ip->id!!}">
                <td>
                    <input id="{!!$ip->id!!}" name="{!!$ip->page!!}" type="checkbox" data-id="{!!$ip->id!!}">
                </td>
                <td>{!!$ip->ip!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/ip/{!!$ip->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/ip/{!!$ip->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/ip/{!!$ip->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ips->render() !!}

</section>
@endsection
@section('js')
    <script>
        $('.content').find('.js-delete-page').stop().fadeOut(400);

        $('table thead').on('change', 'input[type=checkbox]', function () {
            const checked = $(this).prop('checked');
            const $table = $(this).parents('table');
            if (checked === true) {
                $table.find('tbody input[type=checkbox]').each(function () {
                    $(this).prop('checked', true)
                });
            } else {
                $table.find('tbody input[type=checkbox]').each(function () {
                    $(this).prop('checked', false)
                });
            }
        });

        $('.data-table').on('change', 'input[type=checkbox]', function () {
            let counter = 0;
            $(this).parents('.content').find('table tbody input[type=checkbox]:checked').each(function () {
                counter++;
            });
            if (counter > 0) {
                $(this).parents('.content').find('.js-delete-page').stop().fadeIn(400);
            } else {
                $(this).parents('.content').find('.js-delete-page').stop().fadeOut(400);
            }
        });

        $('.content').on('click', '.js-delete-page', function (e) {
            e.preventDefault();
            const $table = $(this).parents('.content').find('table');
            const ids = [];
            $table.find('tbody input[type=checkbox]:checked').each(function () {
                ids.push($(this).data('id'));
            });
            if (ids.length > 0) {
                if (confirm('Are you sure you want to delete this?')) {
                    let counter = 0;
                    const promises = [];
                    ids.every(function (id) {
                        let request = $.ajax({
                            url: '/ip/' + id + '/delete',
                            method: 'GET',
                            dataType: "json",
                            success: function () {
                                // const $row = $table.find(id).parents('tr');
                                // $row.remove();
                                console.log('Success');
                            },
                            error: function () {
                                counter++;
                            }
                        });
                        $('#'+id).remove();
                        promises.push(request);
                        return true;
                    });
                    $.when.apply(null, promises)
                        .done(function () {
                            $table.parents('.content').find('.js-delete-page').stop().fadeOut(400);
                            if (counter === 0) {
                                console.log('Successful!', 'Your pages has been successfully deleted.', 'success');
                            } else {
                                console.log('Error!', `${counter} couldn't be deleted, please try again later`, 'error');
                            }
                        })
                        .fail(function () {
                            console.log('Error!', `Your records couldn't be deleted, please try again later`, 'error');
                        });
                }
            } else {
                console.log('Error!', 'Please select an item before clicking on the delete button' , 'error');
            }//if ids where actually selected
        });
    </script>
@endsection

