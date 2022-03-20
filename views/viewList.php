<?php
define("TITLE", "Product List");
define("BUTTON_1", 'id="add-product-btn" href="./add-product">ADD');
define("BUTTON_2", 'id="delete-product-btn" name="deleter" onclick="document.getElementById(\'product_list\').submit()">MASS DELETE');
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
        <?php
        // Nolasām produktu sarakstu no datubāzes
        $connectDB = new database();
        $inventory = $connectDB->getProductList();
        $counter = 0;
        foreach ($inventory as $item) {
            $counter += 1;
            // Card, kuras info tiek aizpildīts ar klases pasniegtajiem datiem
            // Echo ir divi tabi, lai kad lietotājs skatās mājaslapas kodu, tai nav briesmīgs noformējums
            echo '        <div class="col card border-dark">
            <input name="Item' . $counter . '" class="form-check-input delete-checkbox" type="checkbox" value="' . $item->getSKU() . '">
            <div class="cardContents text-center">
                <p class="sku text-muted">' . $item->getSKU() . '</p>
                <p class="name">' . $item->getName() . '</p>
                <p class="price">' . $item->getPrice() . '</p>
                <p class="attributes">
                    <span class="attributeType">' . $item->getValueType() . ': </span>
                    <span class="attributeValue">' . $item->getValue() . '</span>
                    <span class="attributeMeasure">' . $item->getValueMeasure() . '</span>
                </p>
            </div>
        </div>
';
        }; ?>
    </form>
</div>
<?= require(dirname(__DIR__, 1) . "/html/viewFooter.html"); ?>