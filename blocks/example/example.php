<?php
/*
Block Name: Example
Description: example block
Category: custom-blocks
Icon: wordpress-alt
Keywords: example block scaffold
Mode: edit
Align: full
SupportsAlign: left center right wide full
SupportsAnchor: true
SupportsCustomClassName: true
SupportsMode: true
SupportsMultiple: true
SupportsReusable: true
SupportsJSX: false
Example: { "title": "title", "description": "Lorem ipsum dolor sit amet lectus Suspendisse suscipit nulla dolor, vel iaculis metus lobortis a." }
*/

$context = Timber::context();
$context['title'] = get_field('title');
$context['description'] = get_field('description');
$context['classes'] = 'example-block';
$context['block'] = $block;

Timber::render('example/example.twig', $context);

