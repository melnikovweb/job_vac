<?php
function technology_platform_init()
{
	register_taxonomy('technology-platform', ['disease'], [
		'hierarchical' => true,
		'public' => true,
		'labels' => [
			'name' => __('Technology platform', 'vaccines-europe'),
			'singular_name' => __('Technology platform', 'vaccines-europe'),
		],
	]);
}

add_action('init', 'technology_platform_init');
