$(document).ready(function(){
    $("#country ").change(function(){
        var country_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "search_state.php",
            data: 'id='+country_id,
            dataType: "html",
            async: false,
            success: function(data){
                $('#state').html(data);
                $('#city').html('<option value="">---Sélectionner la ville---</option>');
            }
        });
    });
    $("#state ").change(function(){
        var state_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "search_city.php",
            data: 'id='+state_id,
            dataType: "html",
            async: false,
            success: function(data){
                $('#city').html(data);
            }
        });
    });
});