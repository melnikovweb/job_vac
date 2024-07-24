<?php
/**
 * Template Name: Vaccines Pipeline
 *
 * The template for displaying all page-vaccines-pipelines.
 *
 * This is the template that displays all page-vaccines-pipelines by default.
 * Please note that this is the WordPress construct of page-vaccines-pipelines
 * and that other 'page-vaccines-pipelines' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your page-vaccines-pipelines you can use:
 * /mytheme/templates/page-vaccines-pipeline-mypage-vaccines-pipeline.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-vaccines-pipeline-mypage-vaccines-pipeline.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 *
 * * Libraries: jquery
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

// Hero section
$context['hero_content'] = get_field('hero_content');
$context['hero_download_button_text'] = get_field('hero_download_button_text');
$context['hero_download_button_file'] = get_field('hero_download_button_file');
$context['hero_overview_data_title'] = get_field('hero_overview_data_title');
$context['hero_overview_data'] = get_field('hero_overview_data');

// Latest vaccines in development
$context['latest_vaccines_in_development_title'] = get_field('latest_vaccines_in_development_title');
$context['latest_vaccines_in_development_subtitle'] = get_field('latest_vaccines_in_development_subtitle');

$disease_args = array(
	'post_type' => 'disease',
	'posts_per_page' => -1,
);
$context['disease_posts'] = Timber::get_posts($disease_args);

$context['technology_platform_terms'] = Timber::get_terms('technology-platform', array('hide_empty' => true));
$context['development_phase_terms'] = Timber::get_terms('development-phase', array('hide_empty' => true));
$context['trial_population_terms'] = Timber::get_terms('trial-population', array('hide_empty' => true));

$context['all_diseases_areas_popup_title'] = get_field('all_diseases_areas_popup_title', 'options');
$context['all_diseases_areas_image'] = get_field('all_diseases_areas_image', 'options');
$context['all_diseases_areas_popup_bg_image'] = get_field('all_diseases_areas_popup_bg_image', 'options');
$context['technology_platforms_popup_title'] = get_field('technology_platforms_popup_title', 'options');
$context['technology_platforms_image'] = get_field('technology_platforms_image', 'options');
$context['technology_platforms_popup_bg_image'] = get_field('technology_platforms_popup_bg_image', 'options');
$context['development_phases_popup_title'] = get_field('development_phases_popup_title', 'options');
$context['development_phases_image'] = get_field('development_phases_image', 'options');
$context['development_phases_popup_bg_image'] = get_field('development_phases_popup_bg_image', 'options');
$context['trial_population_popup_title'] = get_field('trial_population_popup_title', 'options');
$context['trial_population_image'] = get_field('trial_population_image', 'options');
$context['trial_population_popup_bg_image'] = get_field('trial_population_popup_bg_image', 'options');

// Report section
$context['report_section_title'] = get_field('report_section_title');
$context['report_section_modal_title'] = get_field('report_section_modal_title');
$context['report_section_modal_bg_image'] = get_field('report_section_modal_bg_image');
$context['report_section_terms'] = Timber::get_terms('report-section', array('hide_empty' => true));

// Charts section
$context['charts_title'] = get_field('charts_title');
$context['charts_text'] = get_field('charts_text');
$context['charts_slider'] = get_field('charts_slider');

// Advantages
$context['advantages_title'] = get_field('advantages_title');
$context['advantages_blocks'] = get_field('advantages_blocks');

// Review
$context['review_title'] = get_field('review_title');
$context['review_download_button_text'] = get_field('review_download_button_text');
$context['review_download_button_file'] = get_field('review_download_button_file');

Timber::render('page-vaccines-pipeline.twig', $context);
