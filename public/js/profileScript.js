$(document).ready(function () {
    let table = $("#tbody_profile");

    $("#search_name").keyup(function () {
        console.log($("#search_name").val());

        $.ajax({
            url: `http://127.0.0.1:8000/getLiveSearch`,
            method: "GET",
            data: {
                name: $("#search_name").val(),
            },
            success: function (result) {
                console.log(result);

                table.empty();

                table.html(result.output);
            },
            error: function (result) {
                console.error(result);
            },
        });
    });
});
