<?php
/**
 * The template for QA single page
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

 $context = Timber::context();

Timber::render('page-qa-single.twig', $context);
