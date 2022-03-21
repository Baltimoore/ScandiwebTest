<?php
define("TITLE", "Product List");
define("BUTTON_1", 'onclick="location.href=\'http://scandistore.maskless.id.lv/add-product\'">ADD');
define("BUTTON_2", 'onclick="document.getElementById(\'product_list\').submit()">MASS DELETE');
// Lai būtu iespējams ievietot mainīgos paraugā
ob_start();
require(dirname(__DIR__, 1) . "/html/pageHead.html");
require(dirname(__DIR__, 1) . "/html/viewRibbon.html");
ob_end_flush();

// Atlasīto lietu izdzēšanai no datubāzes
require(dirname(__DIR__, 1) . "/php/itemRemove.php");
?>

<div id="content" class="container">
    <form id="product_list" class="row row-cols-auto" action="/" method="POST">
        <?php require(dirname(__DIR__, 1) . "/php/itemList.php"); ?>
    </form>
</div>
<?= require(dirname(__DIR__, 1) . "/html/viewFooter.html"); ?>