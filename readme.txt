=== PDF Thumbnails ===
Contributors: stianlik
Tags: pdf,thumbnail,generator
License: WTFPL
License URI: http://www.wtfpl.net/
Stable tag: 0.0.3

This plugin generates thumbnails for PDF files on upload. The thumbnail is a
picture of the first page of uploaded document, and will appear as an image in
your media gallery. 

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
