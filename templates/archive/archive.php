<?php

/**
 * The template for displaying archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$context = Timber::context();

//archive page header with categories

$blog_page_id = get_option('page_for_posts');
$context['blog_page_title'] = get_the_title($blog_page_id);

$raw_blog_categories = get_categories(array(
    'include' => wp_list_pluck(get_post_meta($blog_page_id, 'category'), 'term_id')
));

$context['blog_categories'] = array();
if (is_array($raw_blog_categories)) {
    foreach ($raw_blog_categories as $cat) {
        if ($cat->name !== 'Uncategorized' && $cat->parent === 0) {
            $context['blog_categories'][] = ['name' => $cat->name, 'link' => get_category_link($cat), 'slug' => $cat->slug];
        }
    };
    $context['blog_categories'] = array_merge([['name' => 'All', 'link' => home_url('/media-hub')]], $context['blog_categories']);
};


//display all posts

$posts_per_page = 9;
$term = get_queried_object();

$taxonomy = 'category';
$tax_query = array(
    array(
        'taxonomy' => $taxonomy,
        'field'    => 'slug',
        'terms'    => $term->slug,
    ),
);
//display all upcoming events
if ($term->slug == 'events' || $term->slug == 'external-events'  || $term->slug == 'vaccines-europe-events') {
    $today = date('Ymd');
    $args_first_posts = array(
        'post_type' => 'post',
        'posts_per_page'      => $posts_per_page,
        'tax_query'           => $tax_query,
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'value' => $today,
                'compare' => '>='
            )
        ),
    );
    $context['no_upcoming_events'] = __('No upcoming events');
} else {
    $args_first_posts = array(
        'post_type' => 'post',
        'posts_per_page'      => $posts_per_page,
        'tax_query'           => $tax_query,

    );
}

$first_posts_query = new Timber\PostQuery($args_first_posts);
$context['firstposts'] = $first_posts_query->get_posts();
$context['show_load_more'] =  $first_posts_query->found_posts / $posts_per_page <= 1 ? false : true;
$context['current_category'] = $term->slug;
$context['category_header'] = $term->name;

//display child categories
if ($term->slug !== 'events') {
    $raw_child_categories = get_terms($term->taxonomy, array(
        'parent'    => $term->term_id,
        'hide_empty' => true
    ));

    $context['child_categories'] = array();

    if (is_array($raw_child_categories)) {
        foreach ($raw_child_categories as $cat) {
            $context['child_categories'][] = ['name' => $cat->name, 'link' => get_term_link($cat), 'slug' => $cat->slug, 'current' => false];
        };
        $context['child_categories'] = array_merge([['name' => 'All', 'link' => get_category_link($term->slug), 'slug' => $term->slug, 'current' => true]], $context['child_categories']);
    };
}
//display child categories for events if they have upcoming events
if ($term->slug === 'events') {
    $raw_child_categories = get_terms($term->taxonomy, array(
        'parent'    => $term->term_id,
        'hide_empty' => true
    ));

    $context['child_categories'] = array();

    if (is_array($raw_child_categories)) {
        $context['child_categories'][] = ['name' => 'All', 'link' => get_category_link($term->slug), 'slug' => $term->slug, 'current' => true];
        foreach ($raw_child_categories as $category) {
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => $term->taxonomy,
                        'field'    => 'term_id',
                        'terms'    => $category->term_id,
                    )
                ),
                'meta_query'     => array(
                    array(
                        'key'     => 'event_date',
                        'value'   => date('Ymd'),
                        'compare' => '>=',
                        'type'    => 'DATE',
                    ),
                ),
            );

            $query_post = new WP_Query($args);
            error_log(print_r($query_post->post_count, true));
            error_log(print_r('asdasdasdasd', true));
            if($query_post->post_count > 0) {
                $context['child_categories'][] = ['name' => $category->slug, 'link' => get_term_link($category), 'slug' => $category->slug, 'current' => false];
            };
        };
        
    }
 }

//display all past events
$events_per_page = 3;
$taxonomy = 'category';
$tax_query = array(
    array(
        'taxonomy' => $taxonomy,
        'field'    => 'slug',
        'terms'    => ['events', 'external-events', 'vaccines-europe-events'],
    ),
);
$today = date('Ymd');
$args_past_events_posts = array(
    'post_type' => 'post',
    'posts_per_page'      => $events_per_page,
    'tax_query'           => $tax_query,
    'meta_query' => array(
        array(
            'key' => 'event_date',
            'value' => $today,
            'compare' => '<'
        )
    )
);

$past_events_posts_query = new Timber\PostQuery($args_past_events_posts);
$context['events_firstposts'] = $past_events_posts_query->get_posts();
$context['events_show_load_more'] =  $past_events_posts_query->found_posts / $events_per_page <= 1 ? false : true;

Timber::render('archive.twig', $context);
