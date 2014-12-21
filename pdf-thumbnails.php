<?php
/**
 * Plugin Name: PDF Thumbnails
 * Description: Generates thumbnail for PDF-files when they are added.
 * Version: 0.0.6
 * Author: Stian Liknes
 * License: GPLv3
 */

require_once dirname(__FILE__). '/PdfThumbnailsPlugin.php';

add_action('init', 'PdfThumbnailsPlugin::onInit');
