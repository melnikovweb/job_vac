<?php
/**
 * search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context          = Timber::context();
$context['title'] = get_search_query();
$context['action'] = esc_url( home_url( '/' ));

$blog_page_id = get_option('page_for_posts');

$raw_blog_categories = get_categories(array(
    'include' => wp_list_pluck(get_post_meta($blog_page_id, 'category'), 'term_id')
));
$context['blog_categories'] = array();
if(is_array($raw_blog_categories) ) {

    foreach( $raw_blog_categories as $cat ) {
        if ($cat->name !== 'Uncategorized' && $cat->parent === 0) {
         $context['blog_categories'][] = ['name' => $cat->name, 'slug' => $cat->slug];
        }
      };
      $context['blog_categories'] = array_merge([['name' => 'All', 'slug' => '']], $context['blog_categories']);
};


$context['posts'] = new Timber\PostQuery();

$context['search_results'] = __('Search results');
$context['no_results'] = __('No results');

Timber::render('search.twig', $context);
