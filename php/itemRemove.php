<?php
if (!empty($_POST)) {
    // Varbūt overkill, bet ja nu lietotājs (vai tā skripts) ir izmainījis DOM vērtības
    $removableItems = array();
    foreach ($_POST as $SKU) {
        $SKU = htmlspecialchars($SKU);
        array_push($removableItems, $SKU);
    }

    // Izejam cauri ciklam vēlreiz, tagad nosūtot dzēšanas komandu datubāzei
    $connectDB = new database();
    foreach ($removableItems as $itemToRemove) {
        $sqlRemove = "DELETE FROM inventory WHERE (SKU='" . $itemToRemove . "')";
        $connectDB->sendCommands($sqlRemove, false);
    }
}
