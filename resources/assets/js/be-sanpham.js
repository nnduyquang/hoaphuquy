var token = $('meta[name="csrf-token"]').attr('content');
$('#summernote').summernote({
    height: 500,
    minHeight: null,
    maxHeight: null,
    focus: true,
});


$('#chooseHinhSanPham').change(function (event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#showHinhSanPham").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
});
$('input[type=checkbox][name=lienhegia]').change(function () {
    if ($(this).prop("checked")) {
        $('input[name=price]').attr("disabled", "disabled");
    }
    else {
        $('input[name=price]').removeAttr("disabled");
    }
});
$('#dataSanPham').DataTable( {
    autoFill: true
} );