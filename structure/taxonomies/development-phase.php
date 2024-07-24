<?php
function development_phase_init()
{
	register_taxonomy('development-phase', ['disease'], [
		'hierarchical' => true,
		'public' => true,
		'labels' => [
			'name' => __('Development phase', 'vaccines-europe'),
			'singular_name' => __('Development phase', 'vaccines-europe'),
		],
	]);
}

add_action('init', 'development_phase_init');
