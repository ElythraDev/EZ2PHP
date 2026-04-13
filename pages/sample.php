<?php

require __DIR__ . '/../config.php';
require __DIR__ . '/../lib/view.php';

$GLOBALS['SEO_DATA'] = [
    'title'       => 'Hello~',
    'description' => 'des',
    'keywords'    => 'kw'
];

$content = View::render(__DIR__ . '/../templates/sample.php', [
    'title' => 'heres_title',
]);

echo $content;
?>

