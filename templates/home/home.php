<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

 
 $context = Timber::context();
 $posts_per_page = 9;

 $args_first_posts = array(
   'post_type' => 'post',
   'posts_per_page' => $posts_per_page,
);
 $first_posts_query = new Timber\PostQuery($args_first_posts);
 $context['firstposts'] = $first_posts_query->get_posts();
 $context['show_load_more'] =  $first_posts_query->found_posts / $posts_per_page <= 1 ? false : true;
 $context['current_category'] = 'All';

 
 $raw_categories = get_categories();
 $context['child_categories'] = array();

if(is_array($raw_categories) ) {

 foreach( $raw_categories as $cat ) {
   if ($cat->name !== 'Uncategorized' && $cat->parent === 0) {
    $context['child_categories'][] = ['name' => $cat->name, 'link' => get_category_link($cat)];
   }
 };
 $context['child_categories'] = array_merge([['name' => 'All', 'link' => home_url('/media-hub')]], $context['child_categories']);
};
   
Timber::render('home.twig', $context);
