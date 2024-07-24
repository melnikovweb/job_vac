<?php
function report_section_init()
{
	register_taxonomy('report-section', ['disease'], [
		'hierarchical' => true,
		'public' => true,
		'labels' => [
			'name' => __('Report section', 'vaccines-europe'),
			'singular_name' => __('Report section', 'vaccines-europe'),
		],
	]);
}

add_action('init', 'report_section_init');
