=== PDF Thumbnails ===
Contributors: stianlik
Tags: pdf,thumbnail,generator
License: WTFPL
License URI: http://www.wtfpl.net/
Stable tag: 0.0.4
Tested up to: 4.0

This plugin generates thumbnails for PDF files on upload. The thumbnail is a
picture of the first page of uploaded document.

== Description ==

This plugin is primarily for theme developers. 

Generated thumbnails are equivallent to [featured
images](https://codex.wordpress.org/Post_Thumbnails) so that common thumbnail
functions like `get_post_thumbnail_id()` can be used also for attachments.

See [Post Thumbnails](https://codex.wordpress.org/Post_Thumbnails) for information
on how you can use thumbnails efficiently.

== Installation ==

- ImageMagick must be installed (http://www.php.net/manual/en/book.imagick.php) to generate thumbnails
- GhostScript must be installed to read PDF-files

The process of installing ImageMagick with GhostScript support can differ

1. Install ghostscript
2. Install imagemagick, compiled with ghostscript support
3. Install PHP extension for imagemagick (can use pecl)
4. Restart web server for changes to take effect

See [Support](https://wordpress.org/support/topic/nothing-but-error-messages) for 
more resources and tips on how this can be done in Windows, Linux and OSX.

== TODO ==

Add generated image to media browser after upload. 

Outline of an implementation based on the javascript media API:

// New uploads
wp.Uploader.queue.on('add', function (attachment) {

    if (attachment.subtype !== 'pdf') {
        return;
    }

    findThumbnailFor(attachment.ID).then(function (data) {

        // Add attachment thumbnail to browser
        var attachment = wp.media.model.Attachment.get(id)
        attachment.fetch().done(function () {
            wp.media.editor.open().state().get('library').add(generated attachment)
        });

    });
});

Filter: ajax_query_attachments_args
