<?php
require __DIR__ . '/../config.php';
require __DIR__ . '/../router.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/index.php', '', $uri);
if ($uri === '') $uri = '/';

ob_start(); 
$router->dispatch($method, $uri); 
$finalContent = ob_get_clean();
?>

        <?php // echo $finalContent; ?>
