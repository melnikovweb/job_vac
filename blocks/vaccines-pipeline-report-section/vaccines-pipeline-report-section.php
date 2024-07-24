<?php
/*
Block Name: vaccines-pipeline-report-section
Description: vaccines-pipeline-report-section block
Category: custom-blocks
Icon: wordpress-alt
Keywords: vaccines-pipeline-report-section block
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
Example: {"preview_image_help": "/blocks/vaccines-pipeline-report-section/preview.jpg"}
*/

$context = Timber::context();
Timber::render('vaccines-pipeline-report-section/vaccines-pipeline-report-section.twig', $context);
