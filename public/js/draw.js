$("#clear").click(function(){
    $("#grid td").css("background-color", "transparent");
});

$("#save").click(function(){
    var colorsAsJson = new Object();
    var i=0;
    $("#grid td").each(function() {
        colorsAsJson[i] = $(this).css("background-color");
        ++i;
    });

    $.ajax({
        type: "post",
        url: "./save_drawing.php",
        dataType: "text",
        data: colorsAsJson,
        success: function(data) {
            $("#debug_message").html("saved image");
            setTimeout(function(){
                $('#debug_message').fadeOut();
            }, 5000);
        },
        failure: function(){
            $("#debug_message").html("An error has occured trying to save the image");
        }
    });
});

// $("form.ajax").submit(function(evt) {
//     evt.preventDefault();
//     var url = $(this).attr('action');
//     var colorsAsJson = new Object();
//     var i=0;
//     $("#grid td").each(function() {
//         colorsAsJson[i] = $(this).css("background-color");
//         ++i;
//     });
//     $("input[name=data]").val(colorsAsJson);
//     var postData = $(this).serialize();
//     $.post(url, postData, function(response){
//             $('#debug_message').html("saved image" + response);
//     });
// });
