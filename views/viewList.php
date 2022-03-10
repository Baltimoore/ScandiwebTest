<?php
define("TITLE", "Product List");
define("BUTTON_1", 'id="add-product-btn" href="./add-product">ADD');
define("BUTTON_2", 'id="delete-product-btn" onclick="">MASS DELETE');
// Lai būtu iespējams ievietot mainīgos paraugā
ob_start();
require(dirname(__DIR__, 1) . "/html/pageHead.html");
require(dirname(__DIR__, 1) . "/html/viewRibbon.html");
ob_end_flush();
?>

<div id="content" class="container">
    <div class="row row-cols-auto"><?php 
    // Nolasām produktu tipu datus no datubāzes, un ievietojam tos masīvā
    $types[] = new type();

    // Nolasām produktu datus no datubāzes, un ievietojam tos masīvā
    $products[] = new item();
    $sql = "SELECT * FROM inventory;";
    $info = mysqli_query($connection, $sql);
    //kamēr ir kāda rinda
    $i = 0;
    while($row = mysqli_fetch_assoc($info)) {
        $products[$i]->setSKU($row['SKU']);
        $products[$i]->setName($row['Name']);
        $products[$i]->setPrice($row['Price']);
        $products[$i]->setValue($row['Type']);
        $products[$i]->setType($row['Value']);
        $i++;
    }

    for ($i=0; $i < sizeof($products); $i++) {
        // Card, kuras info tiek aizpildīts ar klases pasniegtajiem datiem
        // Echo atdalīts tukšā rindā, lai kad lietotājs skatās mājaslapas kodu, nav briesmīgs noformējums
        echo '
        <div class="col card border-dark">
            <input class="form-check-input delete-checkbox" type="checkbox" value="" aria-label="Select for deletion">
            <div class="cardContents text-center">
                <p class="sku text-muted">' . $products[$i]->readSKU() . '</p>
                <p class="name">' . $products[$i]->readName() . '</p>
                <p class="price">' . $products[$i]->readPrice() . '</p>
                <p class="attributes">
                    <span class="attributeType">' . $products[$i]->readType() . ': </span>
                    <span class="attributeValue">' . $products[$i]->readValue() . '</span>
                    <span class="attributeMeasure">' . $attributeMeasure . '</span>
                </p>
            </div>
        </div>';
    };
    echo "\n";?>
    </div>
</div>
<?= require(dirname(__DIR__, 1) . "/html/viewFooter.html"); ?>