=== PDF Thumbnails ===
Contributors: stianlik
Tags: pdf,thumbnail,generator
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Stable tag: 1.0.0
Tested up to: 4.2.1

This plugin generates a thumbnail everytime you upload a PDF attachment.
Generated thumbnail is an image of the first page in uploaded document.

== Description ==

This plugin hooks into the media manager and generates a thumbnail everytime a
PDF is uploaded. Generated thumbnail is an image of the first page in the
uploaded document and is named `PDFNAME-thumbnail`, where `PDFNAME` is replaced
by uploaded document filename.

Generated thumbnails are equivalent to [featured
images](https://codex.wordpress.org/Post_Thumbnails) so that common thumbnail
functions like `get_post_thumbnail_id()` can be used for PDF attachments. See
[Post Thumbnails](https://codex.wordpress.org/Post_Thumbnails) for information
on how you can use thumbnails efficiently.

Integration with the javascript media API is not yet implemented, therefore, you
may need to reload the page before you can see generated thumbnail after an
upload.

== Installation ==

PDF Thumbnails requires ImageMagick with GhostScript support. If you are lucky,
this is already installed on your system, otherwise, installation can be done
with the following steps:

1. Install ghostscript
2. Install imagemagick with ghostscript support
3. Install PHP extension for imagemagick (can use pecl)
4. Restart web server for changes to take effect

Details may differ based on which operating system you are running, see
[Support](https://wordpress.org/support/topic/nothing-but-error-messages) for
more resources and tips on how this can be done in Windows, Linux and OSX.

= Debian / Ubuntu =

`
sudo apt-get install ghostscript php5-imagick
sudo service apache2 restart
`

== TODO ==

Add generated image to media browser after upload. 

Outline of an implementation based on the javascript media API:

`
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
`

Filter: ajax_query_attachments_args
