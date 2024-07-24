<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$context['sorry_message'] = __("SORRY, WE COULDN'T FIND WHAT YOU'RE LOOKING FOR.");
$context['main'] = __("Back to home page");
Timber::render('404.twig', $context);
