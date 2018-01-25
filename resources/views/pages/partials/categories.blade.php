@cache($cat)
<a href="{{url('/tags/'.$cat->name)}}" class="text-black">{{$cat->name}}</a>
{{$loop->remaining ? ' / ' : ''}}
@endcache
