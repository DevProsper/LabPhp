'use strict';
$(document).ready(function (e) {
    $("#ville").on("change", function (e) {
        e.preventDefault();
        var ville = $('#ville').val();
        if (ville !== "0") {
            var url = "http://localhost:8080/sygectsa/communes/" + ville;
            //var jsonData = {"nom": ville};
            $.ajax({
                url: url,
                type: 'get',
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function (data) {

                    $('#commune')
                            .empty()
                            .append($('<option>', {
                                value: 0,
                                text: "--- Selectionnez une commune ---"
                            }));

                    $.each(data, function (i, element) {
                        $('#commune')
                                .append($('<option>', {
                                    value: element.nom,
                                    text: element.nom
                                }));
                    });

                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        } else {
            $('#commune')
                    .empty()
                    .append($('<option>', {
                        value: 0,
                        text: "--- Selectionnez une commune ---"
                    }));
        }
        return false;
    });
});
