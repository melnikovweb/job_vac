<?php

add_action('init', function () {

	/**
	 * Post Type: Disease.
	 */

	$labels = [
		"name" => __("Diseases", 'vaccines-europe'),
		"singular_name" => __("Disease", 'vaccines-europe'),
	];

	$args = [
		"label" => __("Diseases", "vaccines-europe"),
		"labels" => $labels,
		"public" => true,
		"has_archive" => false,
		"hierarchical" => true,
		"supports" => ['title', 'thumbnail'],
		"menu_icon" => 'dashicons-tickets-alt',
		"rewrite" => ["slug" => "vaccines-pipeline/diseases", "with_front" => false],
	];

	register_post_type("disease", $args);
});

