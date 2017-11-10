$(document).ready(function(){
    $(".searchTerm").keyup(function(){
        var text = $(this).val();
        $.ajax({
            type: "POST",
            url: "search.php",
            data: 'text='+text,
            dataType: "html",
            async: false,
            success: function(text){
                $('.search_box').html(text);
            }

        });
    });
});