<?php
define("TITLE", "Product List");
define("BUTTON_1", 'id="add-product-btn" onclick="">ADD');
define("BUTTON_2", 'id="delete-product-btn" onclick="">MASS DELETE');
// Lai būtu iespējams ievietot mainīgos paraugā
ob_start();
require(dirname(__DIR__, 1) . "/html/viewHeader.html");
ob_end_flush();
?>

<div id="body" class="container">
    <div class="row row-cols-auto"><?php 
    $itemCount = 1; //kkāds inventāra skaita lasīšanas skripts no datubāzes
    for ($i=0; $i < $itemCount; $i++) {
        //visi mainīgie apakšā lasa no klases vai kkā tāda
        $sku = "SGRE15672326";
        $name = "Yuri";
        $price = "69.69";
        $attributeType = "DVD";
        $attributeValue = "15";
        $attributeMeasure = "MB";
        // Card, kuras info tiek aizpildīts ar klases pasniegtajiem datiem
        // Echo atdalīts tukšā rindā, lai kad lietotājs skatās mājaslapas kodu, nav briesmīgs noformējums
        echo '
        <div class="col card border-dark">
            <input class="form-check-input delete-checkbox" type="checkbox" value="" aria-label="Select for deletion">
            <div class="cardContents text-center">
                <p class="sku text-muted">' . $sku . '</p>
                <p class="name">' . $name . '</p>
                <p class="price">' . $price . '</p>
                <p class="attributes">
                    <span class="attributeType">' . $attributeType . ': </span>
                    <span class="attributeValue">' . $attributeValue . '</span>
                    <span class="attributeMeasure">' . $attributeMeasure . '</span>
                </p>
            </div>
        </div>';
    };
    echo "\n";?>
    </div>
</div>
<?= require(dirname(__DIR__, 1) . "/html/viewFooter.html"); ?>