<?php
define("TITLE", "Product Add");
define("BUTTON_1", 'id="save-product-btn" onclick="">Save');
define("BUTTON_2", 'id="cancel-product-btn" href="/">Cancel');
// Lai būtu iespējams ievietot mainīgos paraugā
ob_start();
require(dirname(__DIR__, 1) . "/html/pageHead.html");
require(dirname(__DIR__, 1) . "/html/viewRibbon.html");
ob_end_flush();
?>

<div id="content" class="container">
    <div id="product_form">
        <div class="row">
            <label for="sku" class="col-1">SKU</label>
            <input id="sku" class="col-2" type="text">
        </div>
        <div class="row">
            <label for="name" class="col-1">Name</label>
            <input id="name" class="col-2" type="text">
        </div>
        <div class="row">
            <label for="price" class="col-1">Price ($)</label>
            <input id="price" class="col-2" type="text">
        </div>
        <div class="row">
            <label for="productType" class="col-2">Type Switcher</label>
            <select id="productType" class="form-select" onchange="revealer()">
                <option selected disabled>Choose a type</option>
                <option value="DVD">DVD</option>
                <option value="BCK">Book</option>
                <option value="FRN">Furniture</option>
            </select>
        </div>

        <div id="itemProperties">
            <div id="DVD" class="row">
                <label for="size" class="col-1">Size (MB)</label>
                <input id="size" class="col-2" type="text">
            </div>
            <div id="BCK" class="row">
                <label for="weight" class="col-1">Weight (KG)</label>
                <input id="weight" class="col-2" type="text">
            </div>
            <div id="FRN">
                <div class="row">
                    <label for="height" class="col-1">Height (CM)</label>
                    <input id="height" class="col-2" type="text">
                </div>
                <div class="row">
                    <label for="width" class="col-1">Width (CM)</label>
                    <input id="width" class="col-2" type="text">
                </div>
                <div class="row">
                    <label for="length" class="col-1">Length (CM)</label>
                    <input id="length" class="col-2" type="text">
                </div>
            </div>
            <p id="helpInfo"></p>
        </div>
    </div>
    <script type="text/javascript" src="../js/typeInput.js" defer></script>
</div>

<?= require(dirname(__DIR__, 1) . "/html/viewFooter.html"); ?>