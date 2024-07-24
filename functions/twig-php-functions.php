<?php
add_filter( 'timber/twig', 'add_to_twig' );

/**
 * My custom Twig functionality.
 *
 * @param \Twig\Environment $twig
 *
 * @return \Twig\Environment
 */
function add_to_twig( $twig ) {

	//Helpers
	$twig->addFunction( new Timber\Twig_Function( 'pvd', 'pvd' ) );
	$twig->addFunction( new Timber\Twig_Function( 'get_image', 'get_image' ) );
	$twig->addFunction( new Timber\Twig_Function( 'inline_svg', 'inline_svg' ) );
	$twig->addFunction( new Timber\Twig_Function( 'get_clean_phone', 'get_clean_phone' ) );
	$twig->addFunction( new Timber\Twig_Function( 'regex_text_to_span', 'regex_text_to_span' ) );
	$twig->addFunction( new Timber\Twig_Function( 'show_post_img', 'show_post_img' ) );
	$twig->addFunction( new Timber\Twig_Function( 'show_post_cat', 'show_post_cat' ) );
	$twig->addFunction( new Timber\Twig_Function( 'show_post_date', 'show_post_date' ) );
	$twig->addFunction( new Timber\Twig_Function( 'get_youtube_id', 'get_youtube_id' ) );
	$twig->addFunction( new Timber\Twig_Function( 'get_youtube_iframe', 'get_youtube_iframe' ) );
	$twig->addFunction( new Timber\Twig_Function( 'get_post_meta', 'get_post_meta' ) );

	return $twig;
}
