$("#search").on("keyup", function () {
    $value = $(this).val();

    if ($value) {
        $("#all-data").hide();
        $("#search-data").show();
    } else {
        $("#all-data").show();
        $("#search-data").hide();
    }

    $.ajax({
        type: "get",
        url: "/search",
        data: { search: $value },

        success: function (data) {
            $("#search-data").html(data);
        },
    });
});
