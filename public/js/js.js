/* setting a method clearText to String - changes all sapces to '-' */
String.prototype.clearText = function () {
    return this.toString().trim().replace(/\s/g, '-')
}

/* implementing .clearText when admin writes smth in input, used to create URL names */
$('.text-origin').on("keyup", function () {
    $('.text-target').val($(this).val().clearText());

});

/* error/success messages slideup with delay of 3 sec */
$('.ms_box').delay(3000).slideUp();

$('.addToCart').on("click", function () {
    var id = $(this).data('id');
    $.ajax({
        url: base_url + "/shop/addToCart",
        datatype: "html",
        type: "get",
        data: {product_id: id},
        success: function () {
            location.reload();
        }
    })
})

$('.updateCart').on("click", function () {
    var id = $(this).data('id');
    var val = $(this).val();
    $.ajax({
        url: base_url + "/shop/updateCart",
        datatype: "html",
        type: "get",
        data: {
            product_id: id,
            op: val
        },
        success: function () {
            location.reload();
        }
    })
})

/* 10 carousel example */
$('#carousel-10').carousel({
    interval: 2000,
    wrap: true,
    keyboard: true
});

/* 11 carousel example */
$('#carousel-11').carousel({
    interval: 4000,
    wrap: true,
    keyboard: true
});

/* 12 carousel example */
$('#carousel-12').carousel({
    interval: 6000,
    wrap: true,
    keyboard: true
});

/* 13 carousel example */
$('#carousel-13').carousel({
    interval: 8000,
    wrap: true,
    keyboard: true
});