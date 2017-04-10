$('#chooseHinhLogo').change(function (event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#showLogo").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
});
$('#chooseHinhMainTrai').change(function (event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#showHinhMainTrai").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
});
$('#summernoteCauHinhLienHe').summernote({
    height: 300,
    minHeight: null,
    maxHeight: null,
    focus: true,
});