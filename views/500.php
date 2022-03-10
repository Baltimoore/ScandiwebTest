<?php
// Lai būtu iespējams ievietot mainīgos iekš HTML templatiem
define("ERROR_NUM", "500");
define("TITLE", "Error " . ERROR_NUM);
define("ERROR_TEXT", "server has the ded");

ob_start();
require(dirname(__DIR__, 1) . "/html/pageHead.html");
require(dirname(__DIR__, 1) . "/html/viewErrors.html");
require(dirname(__DIR__, 1) . "/html/viewFooter.html");
ob_end_flush();