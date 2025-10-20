$(document).ready(function () {
    // hide and show
    $('#toggle-images-btn').on('click', function () {
        const gallery = $('#image-preview-container');

        gallery.toggle();

        if (gallery.is(':visible')) {
            $(this).text('Hide Images');
        } else {
            $(this).text('Show Images');
        }
    });

    // up gambar
    $('#image-upload').on('change', function (event) {
        const files = event.target.files;
        const previewContainer = $('#image-preview-container');

        // memeriksa ada file
        if (files.length > 0) {
            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const previewItem = $('<div class="preview-item"></div>');
                    const img = $('<img />').attr('src', e.target.result);

                    previewItem.append(img);

                    // menambahkan div yg berisi gambar ke container
                    previewContainer.append(previewItem);
                };
                // proses membaca konten file
                reader.readAsDataURL(file);
            }
        }
    });
});
