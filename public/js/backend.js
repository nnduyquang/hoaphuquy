$('#chooseHinhSanPham').change(function(event){
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#showHinhSanPham").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
});