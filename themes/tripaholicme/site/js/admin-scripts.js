jQuery(function($){

    var mediaUploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose a Picture for About Us Background',
        button: {text: 'Choose Picture'},
        multiple: false
    });
    
    $('#upload-button').on('click', function(e){
        e.preventDefault();
        mediaUploader.open();
    });
    
    mediaUploader.on('select', function(){
        attachment = mediaUploader.state().get('selection').first().toJSON();
        $('#about-us-bg-picture').val(attachment.url);
        $('#about-us-bg-picture-preview').css('backgroundImage', 'url(' + attachment.url + ')');

        //$('#tripaholicme-main-form').submit();
    })

})
