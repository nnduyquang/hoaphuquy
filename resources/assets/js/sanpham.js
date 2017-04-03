$('#summernote').summernote({
    height:500,
    minHeight: null,
    maxHeight:null,
    focus:true
});
$('#chooseHinhSanPham').change(function(event){
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#showHinhSanPham").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
});