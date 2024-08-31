jQuery(document).ready(function($) {
    var mediaUploader;

    $('#jl_ucp_upload_button').click(function(e) {
        e.preventDefault();

        // If the media uploader object has already been created, reopen the dialog
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        // Create the media uploader object
        mediaUploader = wp.media({
            title: 'Select Background Image',
            button: {
                text: 'Use this image'
            },
            multiple: false // Set to true to allow multiple files
        });

        // When a file is selected, grab the URL and set it as the value of the input field
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#jl_ucp_background_image').val(attachment.url);
        });

        // Open the media uploader dialog
        mediaUploader.open();
    });
});
