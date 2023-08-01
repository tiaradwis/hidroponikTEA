$(".increment-btn").click(function (e) {
    e.preventDefault();
    var idk = $(this).closest(".keranjang_data").find("#id_keranjang").val();
    var qty_old = $(this).closest(".keranjang_data").find(".input-qty").val();

    var values = parseInt(qty_old);

    values = isNaN(values) ? 0 : values;
    values++;
    $(this).closest(".keranjang_data").find(".input-qty").val(values);

    $.ajax({
        type: "get",
        url: "updateQtyCart",
        data: { qty: values, id_keranjang: idk },
    });
});

$(".decrement-btn").click(function (e) {
    e.preventDefault();
    var idk = $(this).closest(".keranjang_data").find("#id_keranjang").val();
    var qty_old = $(this).closest(".keranjang_data").find(".input-qty").val();

    var values = parseInt(qty_old);

    values = isNaN(values) ? 0 : values;
    if (values > 1) {
        values--;
        $(this).closest(".keranjang_data").find(".input-qty").val(values);
    }

    $.ajax({
        type: "get",
        url: "updateQtyCart",
        data: { qty: values, id_keranjang: idk },
    });
});
