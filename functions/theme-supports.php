<?php

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'title-tag');
//add_theme_support( 'custom-logo' );

function alphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'alphabet_widgets_init' );

add_action('after_setup_theme', 'custom_logo_setup');



function custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'header-logo' => array(
            'width'       => 200,
            'height'      => 100,
            'flex-width'  => true,
            'flex-height' => true,
        ),
        'footer-logo' => array(
            'width'       => 150,
            'height'      => 75,
            'flex-width'  => true,
            'flex-height' => true,
        ),
    ));
}

add_theme_support(
	'custom-header',
	array(
		'height' => '30',
		'flex-height' => true,
		'uploads' => true,
		'header-text' => false,
	)
);

add_action('after_setup_theme', function () {
	register_nav_menus([
		'header_menu' => 'Header Menu',
		'footer_menu' => 'Footer Menu'
	]);
});

function get_youtube_id( $video_url ) {
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $youtube_id);

	return $youtube_id[1];
}

function get_youtube_iframe( $video_url, $title ) {
	$youtube_id = get_youtube_id( $video_url );

	echo '<iframe class="content" title="'. $title .'" src="https://www.youtube.com/embed/'. $youtube_id .'?autoplay=0&mute=0" width="100%" height="100%" loading="lazy" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>';
}
