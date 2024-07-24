<?php
/*
Block Name: vaccines-video-popup
Description: vaccines-video-popup block
Category: custom-blocks
Icon: wordpress-alt
Keywords: vaccines video popup block
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
*/


$context                  = Timber::context();
$context['fields']        = get_fields();
$context['class']         = 'vaccines-video-popup';
$context['classes']       = 'gutenberg-block';
$context['block']         = ! empty( $block ) ? $block : null;
$context['block_classes'] = $block['className'] ?? null;

Timber::render( 'vaccines-video-popup/vaccines-video-popup.twig', $context );
