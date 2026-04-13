<?php
// config.php

if (!defined('DB_HOST')) define('DB_HOST', '127.0.0.1');
if (!defined('DB_NAME')) define('DB_NAME', 'test');
if (!defined('DB_USER')) define('DB_USER', 'test');
if (!defined('DB_PASS')) define('DB_PASS', 'testtest');
if (!defined('DB_CHARSET')) define('DB_CHARSET', 'utf8mb4');
if (!defined('ENVIRONMENT')) define('ENVIRONMENT', 'development'); // 或 'production'

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false, // 使用真正的预处理语句
        PDO::ATTR_STRINGIFY_FETCHES  => false, // 建议不将数值转为字符串
        PDO::ATTR_PERSISTENT         => false, // 不建议使用持久连接!!!
    ];
    
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    
} catch (PDOException $e) {
    // 生产环境不应显示详细错误信息
    error_log('Database Connection Failed: ' . $e->getMessage());
    
    // 生产环境显示友好信息，开发环境显示详细错误
    if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
        die('Database Connection Failed: ' . $e->getMessage());
    } else {
        die('Database connection error. Please try again later.');
    }
}
?>