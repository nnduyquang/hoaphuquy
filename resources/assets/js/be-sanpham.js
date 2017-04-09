var token = $('meta[name="csrf-token"]').attr('content');
$('#summernote').summernote({
    height: 500,
    minHeight: null,
    maxHeight: null,
    focus: true,
    // callbacks: {
    //     onImageUpload: function (files, editor, welEditable) {
    //         sendFile(files[0], editor, welEditable);
    //     }
    // }
});
// function sendFile(file, editor, welEditable) {
//     data = new FormData();
//     data.append("file", file);
//     $.ajax({
//         data: data,
//         type: "POST",
//         // url: '/sml_admin/common/uploadImage',
//         uploadUrl: '{{url("sml_admin/common/uploadImage")}}',
//         data: {
//             '_token':token
//         },
//         cache: false,
//         contentType: false,
//         processData: false,
//         success: function (url) {
//             editor.insertImage(welEditable, url);
//         }
//     });
// }

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
    //Here do the stuff you want to do when 'unchecked'
});
$('#dataSanPham').DataTable( {
    autoFill: true
} );