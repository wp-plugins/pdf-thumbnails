<?php
/**
 * Plugin Name: PDF Thumbnails
 * Description: Generates thumbnail for PDF-files when they are added.
 * Version: 1.0.0
 * Author: Stian Liknes
 * License: GPLv3
 */

require_once dirname(__FILE__). '/PdfThumbnailsPlugin.php';

add_action('admin_init', 'pdf_thumbnails_admin_int');

function pdf_thumbnails_admin_int()
{
    if (!extension_loaded('imagick')) {
        add_action('admin_notices', 'pdf_thumbnails_missing_imagick');
        return;
    }
    add_filter('wp_generate_attachment_metadata', 'pdf_thumbnails_generate_attachment_metadata', 10, 2);
    add_action('deleted_post', 'pdf_thumbnails_deleted_post');
}

   
function pdf_thumbnails_generate_attachment_metadata($metadata, $attachment_id)
{
    if (get_post_mime_type($attachment_id) === 'application/pdf') {
        PdfThumbnailsPlugin::instance()->regenerateThumbnail($attachment_id);
    }
    return $metadata;
}

function pdf_thumbnails_deleted_post($post_id)
{
    if (!$post_id) {
        return;
    }
    
    $attachments = get_posts(array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_parent' => (int) $post_id,
        'meta_key' => PdfThumbnailsPlugin::META_KEY
    ));
    
    foreach ($attachments as $attachment) {
        wp_delete_post($attachment->ID);
    }
}

function pdf_thumbnails_missing_imagick()
{
    $message = sprintf(
        __('The <a href="%s">ImageMagick</a> extension must be loaded to generate PDF thumbnails.'),
        esc_url('http://php.net/manual/book.imagick.php')
    );
    ?>
    <div class="error">
        <p><?php echo $message; ?></p>
    </div>
    <?php
}
