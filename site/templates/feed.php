<?php

$notes = page('notes')->grandChildren()->listed();
$micro = page('micro')->children();
$pages = $notes->merge($micro);

$options = [
    'title'       => 'Latest posts',
    'description' => 'Posts by Adam Paszternak',
    'link'        => '',
	'snippet' => 'feed/json'
];
echo $pages->sortBy('date', 'desc')->limit(20)->feed($options);
