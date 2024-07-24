<?php
function trial_population_init()
{
	register_taxonomy('trial-population', ['disease'], [
		'hierarchical' => true,
		'public' => true,
		'labels' => [
			'name' => __('Trial population', 'vaccines-europe'),
			'singular_name' => __('Trial population', 'vaccines-europe'),
		],
	]);
}

add_action('init', 'trial_population_init');
