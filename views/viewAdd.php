<?php
define("TITLE", "Product Add");
define("BUTTON_1", 'onclick="document.getElementById(\'product_form\').submit()">Save');
define("BUTTON_2", 'onclick="location.href=\'http://scandistore.maskless.id.lv/\'">Cancel');
// Lai būtu iespējams ievietot mainīgos paraugā
ob_start();
require(dirname(__DIR__, 1) . "/html/pageHead.html");
require(dirname(__DIR__, 1) . "/html/viewRibbon.html");
ob_end_flush();

// Ievaddatu validācijai un nosūtīšanai uz serveri
require(dirname(__DIR__, 1) . "/php/itemValidate.php");
?>

<div id="content" class="container">
    <form id="product_form" action="/add-product" method="POST">
        <div class="row">
            <label for="SKU" class="col-1">SKU</label>
            <input id="sku" name="SKU" class="col-2" type="text" value="<?= $newProduct['SKU'] ?? ""; ?>">
            <? if (isset($errorMessages['SKU'])) {
                echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['SKU'] . '</div>');
            } ?>
        </div>
        <div class="row">
            <label for="Name" class="col-1">Name</label>
            <input id="name" name="Name" class="col-2" type="text" value="<?= $newProduct['Name'] ?? ""; ?>">
            <? if (isset($errorMessages['Name'])) {
                echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['Name'] . '</div>');
            } ?>
        </div>
        <div class="row">
            <label for="Price" class="col-1">Price ($)</label>
            <input id="price" name="Price" class="col-2" type="text" value="<?= $newProduct['Price'] ?? ""; ?>">
            <? if (isset($errorMessages['Price'])) {
                echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['Price'] . '</div>');
            } ?>
        </div>
        <div class="row">
            <label for="Type" class="col-2">Type Switcher</label>
            <select id="productType" name="Type" class="form-select" onchange="revealer()">
                <option value="DVD" <? if ((isset($newProduct['Type'])) && ($newProduct['Type'] == "DVD")) {
                                        echo "selected";
                                    } ?>>DVD</option>
                <option value="BCK" <? if ((isset($newProduct['Type'])) && ($newProduct['Type'] == "BCK")) {
                                        echo "selected";
                                    } ?>>Book</option>
                <option value="FRN" <? if ((isset($newProduct['Type'])) && ($newProduct['Type'] == "FRN")) {
                                        echo "selected";
                                    } ?>>Furniture</option>
            </select>
            <? if (isset($errorMessages['Type'])) {
                echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['Type'] . '</div>');
            } ?>
        </div>

        <div id="itemProperties">
            <div id="DVD">
                <div class="row">
                    <label for="Size" class="col-1">Size (MB)</label>
                    <input id="size" name="Size" class="col-2" type="text" value="<?= $newProduct['Size'] ?? ""; ?>">
                    <? if (isset($errorMessages['Size'])) {
                        echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['Size'] . '</div>');
                    } ?>
                </div>
                <p class="helpInfo">Please provide the size of this disk in megabytes.<br>
                    For conversion between data measurements, please visit <a href="https://www.unitconverters.net/data-storage-converter.html">this converter</a>.</p>
            </div>
            <div id="BCK">
                <div class="row">
                    <label for="Weight" class="col-1">Weight (KG)</label>
                    <input id="weight" name="Weight" class="col-2" type="text" value="<?= $newProduct['Weight'] ?? ""; ?>">
                    <? if (isset($errorMessages['Weight'])) {
                        echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['Weight'] . '</div>');
                    } ?>
                </div>
                <p class="helpInfo">Please provide the weight of this book in kilograms.<br>
                    For conversion between weight measurements, please visit <a href="https://www.unitconverters.net/weight-and-mass-converter.html">this converter</a>.</p>
            </div>
            <div id="FRN">
                <div class="row">
                    <label for="Height" class="col-1">Height (CM)</label>
                    <input id="height" name="Height" class="col-2" type="text" value="<?= $newProduct['fHeight'] ?? ""; ?>">
                    <? if (isset($errorMessages['fHeight'])) {
                        echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['fHeight'] . '</div>');
                    } ?>
                </div>
                <div class="row">
                    <label for="Width" class="col-1">Width (CM)</label>
                    <input id="width" name="Width" class="col-2" type="text" value="<?= $newProduct['fWidth'] ?? ""; ?>">
                    <? if (isset($errorMessages['fWidth'])) {
                        echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['fWidth'] . '</div>');
                    } ?>
                </div>
                <div class="row">
                    <label for="Length" class="col-1">Length (CM)</label>
                    <input id="length" name="Length" class="col-2" type="text" value="<?= $newProduct['fLength'] ?? ""; ?>">
                    <? if (isset($errorMessages['fLength'])) {
                        echo ('<div class="alert alert-danger ms-auto" role="alert">' . $errorMessages['fLength'] . '</div>');
                    } ?>
                </div>
                <p class="helpInfo">Please provide the dimensions of this furniture in centimeters.<br>
                    For conversion between length measurements, please visit <a href="https://www.unitconverters.net/length-converter.html">this converter</a>.</p>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="../js/typeInput.js" onload="revealer()"></script>
</div>

<?= require(dirname(__DIR__, 1) . "/html/viewFooter.html"); ?>