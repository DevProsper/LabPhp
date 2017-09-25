$(document).ready(function(){
    $(".modal-trigger").leanModal();

    $('select').material_select();

    $(".seen_comment").click(function(){
        var id = $(this).attr("id");
        $.post('ajax/seen_comment.php', {id:id}, function(){
            $("#commentaire_"+id).hide();
        });
    });

    $(".delete_comment").click(function(){
        var id = $(this).attr("id");
        $.post('ajax/delete_comment.php', {id:id}, function(){
            $("#commentaire_"+id).hide();
        });
    });

    $(".parallax").parallax();


});
