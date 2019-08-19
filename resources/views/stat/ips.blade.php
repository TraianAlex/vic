@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <a href='{!!url("stat")!!}' class = 'btn btn-success'><i class="fa fa-rss"></i> Back</a>
    <a href='{!!url("stat")!!}/pages' class = 'btn btn-success'><i class="fa fa-rss"></i> Pages</a>
    <a class="btn btn-success js-delete-page"><i class="fa fa-trash font-size-20"></i> Delete</a>
    <table class = "table table-striped table-bordered table-hover data-table" style = 'background:#fff'>
        <thead>
            <th>
                <input id="checkbox-all" type="checkbox">
            </th>
            <th>{{$total_unique_ips}} uniques IPs</th>
            <th>views</th>
            <th>last visit</th>
            <th>info</th>
        </thead>
        <tbody>
            @foreach($ip_unique as $ip => $sum)
                <tr id="{!!$ip!!}">
                    <td>
                        <input id="{!!$ip!!}" name="{!!$ip!!}" type="checkbox" data-id="{!!$ip!!}">
                    </td>
                    <td>{{$ip}}</td>
                    <td>{{$sum[0]}}</td>
                    <td>{{$sum[1]}}</td>
                    <td>
                        <a href = '/stat/{{ $ip }}/deleteIp' class = 'delete btn btn-danger btn-xs'><i class = 'fa fa-trash'> delete</i></a>
                        <a href = '/stat/ips/{{ $ip }}' class = 'viewShow btn btn-warning btn-xs' data-link = '/stat/ips/{{ $ip }}'><i class = 'fa fa-eye'> info</i></a>
                    </td>
                </tr>
            @endforeach
            @if(isset($pagesByIP))
                <tr><td><h3>Info Result</h3></td></tr>
                @foreach ($pagesByIP as $page => $sum)
                    <tr><td>{{ $page }}</td><td>{{ $sum[0] }}</td><td>{{ $sum[1] }}</td></tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <?=$paginate_ip->count_page()?>
    <?=$paginate_ip->render($request)?>
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
                            url: '/stat/' + id + '/deleteIp',
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
