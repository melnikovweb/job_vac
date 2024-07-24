<?php
/**
 * The Template for displaying all single-disease posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$context['general_information'] = get_field('general_information');
$context['transmission'] = get_field('transmission');
$context['symptoms'] = get_field('symptoms');
$context['epidemiology_title'] = get_field('epidemiology_title');
$context['epidemiology'] = get_field('epidemiology');
$context['vaccines_pipeline_title'] = get_field('vaccines_pipeline_title');
$context['vaccines_in_pipeline'] = get_field('vaccines_in_pipeline');
$context['vaccines_pipeline_override'] = get_field('vaccines_pipeline_override');
$context['vaccines_pipeline_sources'] = get_field('vaccines_pipeline_sources');
$context['vaccines_pipeline_blocks'] = get_field('vaccines_pipeline_blocks');

$timber_post     = Timber::get_post();
$context['post'] = $timber_post;
Timber::render('single-disease.twig', $context);
