<?php
/**
 * Plugin Name: PDF Thumbnails
 * Description: Generates thumbnail for PDF-files when they are added.
 * Version: 0.0.5
 * Author: Stian Liknes
 * License: WTFPL
 */

require_once dirname(__FILE__). '/PdfThumbnailsPlugin.php';

add_action('init', 'PdfThumbnailsPlugin::onInit');
