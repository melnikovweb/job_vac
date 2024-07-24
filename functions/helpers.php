<?php
/**
 * Custom function for showing var_dump() result decorated on browser
 */
function pvd( $var ) {
	echo "<pre style='font-size:16px; overflow-x: hidden; '>";
	var_dump( $var );
	echo "</pre>";
}

/**
 * @param $filename
 *
 * @return void
 */
function get_image( $filename ) {
	echo get_template_directory_uri() . '/resources/img/' . $filename;
}

/**
 * @param $file
 * @param $is_fromlibrary
 *
 * @return void
 */
function inline_svg( $file, $is_fromlibrary = null ) {
	if ( $is_fromlibrary ) {
		echo file_get_contents( $file );
	} else {
		echo file_get_contents( get_template_directory() . '/resources/img/' . $file );
	}
}


/**
 * @param string $item
 */
function get_clean_phone( $item ) {
	if ( empty( $item ) ) {
		return false;
	}

	return preg_replace( "/[^0-9]/", "", $item );
}

function regex_text_to_span( $text ) {

	if ( empty( $text ) ) {
		return false;
	}

	return preg_replace( '/\[(.*?)\]/', '<span>$1</span>', $text );

}

if(!function_exists('show_post_img')) {
	function show_post_img($id, $size) {
		 echo get_the_post_thumbnail($id, $size);
	}
}

if(!function_exists('show_post_cat')) {
	function show_post_cat($post_id) {
		// echo get_the_category_list(' ', '', $id);
		$cat = get_the_category($post_id); 
		echo $cat[0]->cat_name;
	}
}

if(!function_exists('show_post_date')) {
	function show_post_date($id) {
		// echo get_the_category_list(' ', '', $id);
		$date = get_the_date(); 
		echo $date;
	}
}