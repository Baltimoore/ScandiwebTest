<?php

// Error log
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/database/config.php';

// Nepieciešamā mājaslapas skata pārvirzītājs
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '':
    case '/':
        require __DIR__ . '/views/viewList.php';
        break;
    case '/add-product':
        require __DIR__ . '/views/viewAdd.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
