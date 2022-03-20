<?php
// Nolasām produktu sarakstu no datubāzes
$connectDB = new database();
$sqlRequest = "SELECT * FROM inventory;";
$sqlReply = $connectDB->sendCommands($sqlRequest, true);
// Sakārtojam datus tā, lai tos var izmantot
$inventory = array();
foreach ($sqlReply as $row) {
    $itemType =  strval($row["Type"]);
    $item = new $itemType($row);
    array_push($inventory, $item);
}

$counter = 0;
foreach ($inventory as $item) {
    // Iespraužam tukšumu, lai kad lietotājs apskata html kodu, nav neizskaidrojami dīvaina pirmā rindiņa
    if ($counter) echo '        ';
    // div, kura info tiek aizpildīts ar klases pasniegtajiem datiem
    $counter += 1;
    echo '<div class="col card border-dark">
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
};
