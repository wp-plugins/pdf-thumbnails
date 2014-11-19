<?php
/**
 * Plugin Name: PDF Thumbnails
 * Description: Generates thumbnail for PDF-files when they are added.
 * Version: 0.0.4
 * Author: Stian Liknes
 * License: WTFPL
 */

require_once __DIR__ . '/PdfThumbnailsPlugin.php';

add_action('init', 'PdfThumbnailsPlugin::onInit');
