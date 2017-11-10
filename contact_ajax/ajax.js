$(document).ready(function() {

    $('#submit').click(function(e){
        e.preventDefault();

        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#msg_subject").val();
        var message = $("#message").val();

        $.ajax({
            type: "POST",
            url: "Process.php",
            dataType: "json",
            data: {name:name, email:email, subject:subject, message:message},
            success : function(data){
                if (data.code == "200")
                {
                    alert("Success: " +data.msg);
                } 
                else 
                {
                    $('.name').html('<p>'+data.msg['name']+'</p>');
                    $('.email').html('<p>'+data.msg['email']+'</p>');
                    $('.subject').html('<p>'+data.msg['subject']+'</p>');
                    $('.message').html('<p>'+data.msg['message']+'</p>');
                }
            }
        });
    });
});