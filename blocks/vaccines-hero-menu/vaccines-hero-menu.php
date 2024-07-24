<?php
/*
Block Name: vaccines-hero-menu
Description: vaccines-hero-menu block
Category: custom-blocks
Icon: wordpress-alt
Keywords: vaccines-hero-menu block
PostTypes: page post
Mode: edit
Align: full
SupportsAlign: left center right wide full
SupportsAnchor: true
SupportsCustomClassName: true
SupportsMode: true
SupportsMultiple: true
SupportsReusable: true
SupportsJSX: false
Example: {"preview_image_help": "/blocks/vaccines-hero-menu/preview.jpg"}
*/

$context = Timber::context();

$context['title'] = get_the_title();

// Получаем все страницы, по которым будет проходить поиск.
$all_pages = ( new WP_Query() )->query( [ 
	'post_type' => 'page', 
	'posts_per_page' => -1 
] );

// страница, дочерние которой нужно получить
$about_id = get_the_id();

$post = get_post($post_id); 
$context['current_children'] = $post->post_name;

// оставим только дочерние к Portfolio
$page_children = get_page_children( $about_id, $all_pages );

if (!$page_children) {
	$about_id = wp_get_post_parent_id();
	$page_children = get_page_children( $about_id, $all_pages );
}


$context['page_children'] = $page_children;




Timber::render('vaccines-hero-menu/vaccines-hero-menu.twig', $context);

