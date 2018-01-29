@extends('layouts.app')
@section('meta')
<meta name="description" content="Traian Alexandru Web Developer Toronto. Build responsive mobile websites. Webdesign and implementation.">
<meta name="keywords" content="draw, website design, web page design, webdesign, web development, mobile, traian alexandru">
<title>Drawing Grid Example</title>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/draw.css')}}">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script type="text/javascript" src="{{asset('js/draw.js')}}" defer data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
<script defer data-turbolinks-eval="false" data-turbolinks-track="reload">
$(document).ready(function() {
    //50 by 20 grid
    var td;
    for(y=0; y<50; y++) td += "<td>&nbsp;</td>";
    for(i=0; i<20; ++i) $("#grid").append("<tr>" + td + "</tr>");

    $.getJSON('/loadgrid', function(data){
        $("#grid td").each(function(index){
            $(this).css("background-color", data[index]);
        });
    });

    var active_color = "rgb(0, 0, 0)";
    $("#palette td").each(function( index ){
        //bind the onClick event
        $( this ).bind ("click", function(){
             active_color = $(this).css("background-color");
             $("#debug_palette_color").html("Debug console: active palette color is: " +
                 "<span style='width: 20px; height: 20px; background-color:"
                 + active_color + ";'>" + active_color + "</span>");
         });
    });

    $("#clear").click(function(){
        $("#grid td").css("background-color", "transparent");
    });

    $("#grid td").each(function( index ){
        //bind the onClick event
        $( this ).bind ("click", function(){
            $(this).css("background-color", active_color);
        });
    });
});
</script>
@endsection
@section('content')
<section class="mbr-section article content9 cid-qCbNPo4W1h" id="content9-2b" data-rv-view="784" style="margin: 100px 0 100px 0">
    <div class="container">
        <nav class="navbar fixed-top" style="margin-top: 100px; z-index: 1;">
            <table id="palette">
                <tr>
                    <td style="background-color: rgb(0, 0, 0);">&nbsp;</td>
                    <td style="background-color: rgb(119, 119, 119);">&nbsp;</td>
                    <td style="background-color: rgb(255, 255, 255);">&nbsp;</td>
                    <td style="background-color: rgb(255, 0, 0);">&nbsp;</td>
                    <td style="background-color: rgb(0, 255, 0);">&nbsp;</td>
                    <td style="background-color: rgb(0, 0, 255);">&nbsp;</td>
                    <td style="background-color: rgb(0, 255, 255);">&nbsp;</td>
                    <td style="background-color: rgb(255, 255, 0);">&nbsp;</td>
                    <td style="background-color: rgb(255,192,203);">&nbsp;</td>
                    <td style="background-color: rgb(0,128,128);">&nbsp;</td>
                    <td style="background-color: rgb(255,228,225);">&nbsp;</td>
                    <td style="background-color: rgb(211,255,206);">&nbsp;</td>
                    <td style="background-color: rgb(64,224,208);">&nbsp;</td>
                    <td style="background-color: rgb(255,115,115);">&nbsp;</td>
                    <td style="background-color: rgb(230,230,250);">&nbsp;</td>
                    <td style="background-color: rgb(255,165,0);">&nbsp;</td>
                    <td style="background-color: rgb(240,248,255);">&nbsp;</td>
                    <td style="background-color: rgb(176,224,230);">&nbsp;</td>
                    <td style="background-color: rgb(250,235,215);">&nbsp;</td>
                    <td style="background-color: rgb(0,51,102);">&nbsp;</td>
                    <td style="background-color: rgb(128,0,128);">&nbsp;</td>
                    <td style="background-color: rgb(250,128,114);">&nbsp;</td>
                    <td style="background-color: rgb(192,192,192);">&nbsp;</td>
                    <td style="background-color: rgb(102,102,102);">&nbsp;</td>
                    <td style="background-color: rgb(246,84,106);">&nbsp;</td>
                    <td style="background-color: rgb(70,132,153);">&nbsp;</td>
                    <td style="background-color: rgb(128,0,0);">&nbsp;</td>
                    <td style="background-color: rgb(255,246,143);">&nbsp;</td>
                    <td style="background-color: rgb(255,195,160);">&nbsp;</td>
                    <td style="background-color: rgb(255,102,102);">&nbsp;</td>
                    <td style="background-color: rgb(102,205,170);">&nbsp;</td>
                    <td style="background-color: rgb(195,151,151);">&nbsp;</td>
                    <td style="background-color: rgb(8,141,165);">&nbsp;</td>
                    <td style="background-color: rgb(0,206,209);">&nbsp;</td>
                    <td style="background-color: rgb(255,0,255);">&nbsp;</td>
                    <td style="background-color: rgb(245,245,245);">&nbsp;</td>
                    <td style="background-color: rgb(255,218,185);">&nbsp;</td>
                    <td style="background-color: rgb(0,128,0);">&nbsp;</td>
                    <td style="background-color: rgb(14,47,68);">&nbsp;</td>
                    <td style="background-color: rgb(192,214,228);">&nbsp;</td>
                    <td style="background-color: rgb(128,128,128);">&nbsp;</td>
                    <td style="background-color: rgb(102,0,102);">&nbsp;</td>
                    <td style="background-color: rgb(221,221,221);">&nbsp;</td>
                    <td style="background-color: rgb(203,190,181);">&nbsp;</td>
                    <td style="background-color: rgb(139,0,0);">&nbsp;</td>
                    <td style="background-color: rgb(218,165,32);">&nbsp;</td>
                    <td style="background-color: rgb(180,238,180);">&nbsp;</td>
                    <td style="background-color: rgb(175,238,238);">&nbsp;</td>
                    <td style="background-color: rgb(129,216,208);">&nbsp;</td>
                    <td style="background-color: rgb(255,64,64);">&nbsp;</td>
                </tr>
            </table>
        </nav>
        <table id="grid" cellspacing="0"></table>
        <button id="save" type="button" class="btn btn-secondary btn-sm">Save</button>
        <button id="clear" type="button" class="btn btn-danger btn-sm">Clear</button>
        <div id="debug_palette_color"></div>
        <div id="debug_message"></div>
    </div>
</section>
@endsection
