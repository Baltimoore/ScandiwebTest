<?php
require("db.config.php");

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