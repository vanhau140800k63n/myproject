$('.add_test').click(function () {
    $('.test').html('<textarea id="myeditorinstance" name="description"></textarea>');
    tinymce.init({
        selector: 'textarea#myeditorinstance',
        plugins: 'code table lists image',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | forecolor backcolor | image',
        images_file_types: 'jpg,svg,webp',
    });
})