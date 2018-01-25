@cache($link)
<tr>
    <td class="body-item mbr-fonts-style display-7"><a href="{{url('/links/'.$link->id)}}" target="_blank" class="text-black">{{$link->address}}</a> <span style="font-size:14px">(v:{{$link->visits}})</td>
    <td class="body-item mbr-fonts-style display-7">{{$link->description}}</span></td>
    <td class="body-item mbr-fonts-style display-7">
        @foreach($link->categories as $cat)
            @include('pages.partials.categories')
        @endforeach
    </td>
</tr>
@endcache
