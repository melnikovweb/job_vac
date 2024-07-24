<?php

/**
 * Change default Wordpress image template.
 *
 * @param string $filtered_image Full img tag with attributes that will replace the source img tag.
 * @param string $context Additional context, like the current filter name or the function name from where this was called.
 * @param int $attachment_id The image attachment ID. May be 0 in case the image is not an attachment.
 *
 * @return string HTML image
 */

function form_submit_button($button, $form) {
  return '<div class="wp-block-button is-style-small--plus"><div class="button wp-block-button__link wp-element-button"><input type="submit" class="button-input" id="gform_submit_button_' . $form['id'] . '" value="' . $form['button']['text'] . '"></div></div>';
}

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

function remove_category( $string, $type) {           
  if ($type != 'single' && $type == 'category' && (strpos( $string, 'category') !== false) ) {
    $url_without_category = str_replace( "/category/", "/", $string );
    return trailingslashit( $url_without_category );
  }      
  return $string;  
}     

add_filter( 'user_trailingslashit', 'remove_category', 100, 2);  

