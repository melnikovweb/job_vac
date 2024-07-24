<?php

//load more ajax

add_action('wp_ajax_filter_by_category', 'filter_by_category');
add_action('wp_ajax_nopriv_filter_by_category', 'filter_by_category');


function filter_by_category()
{

	$context = Timber::context();
	$context['fields']        = get_fields();
	$context['class']         = 'posts';

	$taxonomy = 'category';

	$terms = isset($_POST['catName']) && $_POST['catName'] !== 'all' ? $_POST['catName'] : '';
	$paged = $_POST['page'] !== 1 ? $_POST['page'] : 1;
	$tax_query = [];

	if ($terms) {
		$tax_query = array(
			'relation' => 'AND',
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => array($terms),
			),
		);
	}


	if ( $_POST['catName'] == 'events' || $_POST['catName'] == 'external-events'  || $_POST['catName'] == 'vaccines-europe-events' ) {
		$today = date('Ymd');

		if ( $_POST['isPastEvents'] == 'true') {		
		$load_posts_args = [
			'post_type' => 'post',
			'posts_per_page' => 3,
			'tax_query'  => $tax_query,
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => $today,
					'compare' => '<'
				)
				),
			'paged' => $paged, 
			'post_status'         => 'publish'
		];
	}else {
		$load_posts_args = [
			'post_type' => 'post',
			'posts_per_page' => 3,
			'tax_query'  => $tax_query,
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => $today,
					'compare' => '>='
				)
				),
			'paged' => $paged, 
			'post_status'         => 'publish'
		];
	}
	}
	else {
		$load_posts_args = [
			'post_type' => 'post',
			'posts_per_page' => 3,
			'tax_query'  => $tax_query,
			'paged' => $paged, 
			'post_status'         => 'publish'
		];
	}

	$filter_by_category = new WP_Query($load_posts_args);
	if ($filter_by_category->have_posts()) {
		while ($filter_by_category->have_posts()) : $filter_by_category->the_post();
			$context['posts_lists'][] = $filter_by_category->post;
		endwhile;
		$response_compile = Timber::compile('parts/components/posts-container.twig', $context);
		wp_reset_postdata();
	} else {
		if ( $filter_by_category->query['meta_query'][0]['key'] ===  "event_date" ) {
			$response_compile = 'No upcoming events';
		} else {
			$response_compile = 'Sorry, no posts found. Try to reload the page';
		}
	}

	//error_log(print_r($response_compile, true));


	wp_send_json([
		'page' => $paged,
		'context' => $context,
		'response_compile' => $response_compile,
		'total_pages' => $filter_by_category->max_num_pages,
		'test_var' => $filter_by_category->query['meta_query'][0]['key'],
	]);
};
