<?php

if (class_exists('Timber')) {
	$timber = new Timber\Timber();
	$timber::$dirname = array('templates', 'blocks', 'layouts');

	add_filter('timber/context', 'add_to_context');
}

function add_to_context($context)
{
	
	$context['homelink'] = get_home_url();
	$context['header_menu']  = new Timber\Menu('header_menu', array('depth' => 3));
	$context['footer_menu']  = new Timber\Menu('footer_menu', array('depth' => 1));
	$context['menu']  = new Timber\Menu();
	$context['logo'] = get_header_image() ?? get_header_image();
	$context['options'] = get_fields('options');
	$context['action'] = esc_url( home_url( '/' ));
	
	$isBlogPage = is_home();
	$isArchivePage = is_archive();
	$isSearchPage = is_search();
	$blogId = get_option('page_for_posts', true);
	$id	= $isBlogPage ? $blogId : get_the_ID();
	$fields = get_fields($id);
	$context['header_color'] = $fields['choose_color'] ?? 'default';
	if ($isArchivePage) {
		$context['header_color'] = 'default';
	}
	if ($isSearchPage) {
		$context['header_color'] = 'transparent';
	}

	return $context;
}
