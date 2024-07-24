<?php
/*
Block Name: vaccines-pipeline-hero
Description: vaccines-pipeline-hero block
Category: custom-blocks
Icon: wordpress-alt
Keywords: vaccines-pipeline-hero block
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
Example: {"preview_image_help": "/blocks/vaccines-pipeline-hero/preview.jpg"}
*/

$context = Timber::context();
Timber::render('vaccines-pipeline-hero/vaccines-pipeline-hero.twig', $context);

