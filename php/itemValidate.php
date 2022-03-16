<?php
if (!empty($_POST)) {
    // Apstrādātiem un derīgiem ievades datiem
    $newProduct = array();
    // Kļūdu paziņojumiem, kas jāizvada pievienošanas skatā
    $errorMessages = array();
    // Pārbaudām, vai piedāvātais SKU der mūsu vajadzībām

    $newProduct['SKU'] = htmlspecialchars($_POST['SKU']);
    $newProduct['Name'] = htmlspecialchars($_POST['Name']);
    $newProduct['Price'] = htmlspecialchars($_POST['Price']);
    $newProduct['Type'] = htmlspecialchars($_POST['Type']);

    if (empty($newProduct['SKU'])) {
        $errorMessages['SKU'] = "SKU cannot be empty!";
    } elseif ((!ctype_alnum($newProduct['SKU'])) || (strlen($newProduct['SKU']) > 9)) {
        if (!ctype_alnum($newProduct['SKU'])) {
            $errorMessages['SKU'] = "SKU can only contain letters and digits! ";
        }
        if (strlen($newProduct['SKU']) > 9) {
            $errorMessages['SKU'] .= "SKU must be shorter than 9 characters!";
        }
    } else {
        // Tā kā SKU jābūt unikālam, pārbaudam, vai tāds jau datubāzē neeksistē
        $sqlRequest = "SELECT * FROM inventory WHERE (SKU = '" . $newProduct['SKU'] . "')";
        $connectDB = new database();
        $sqlReply = $connectDB->sendCommands($sqlRequest, true);
        if ($sqlReply->num_rows) {
            $errorMessages['SKU'] = "An item with this SKU already exists!";
        }
    }
    // Pārbaudām produkta nosaukuma eksistenci
    if (empty($newProduct['Name'])) {
        $errorMessages['Name'] = "Name cannot be nonexistant!";
    }

    // Pārbaudām cenas eksistenci un noformējumu
    if (empty($newProduct['Price'])) {
        $errorMessages['Price'] = "Price cannot be unassigned!";
    } else {
        // Pārbaudām, vai iesniegts pareizi noformēts skaitlis
        if (!preg_match('/^\d{1,10}(?:[\.\,]\d{0,2})?$/', $newProduct['Price'])) {
            $errorMessages['Price'] = "Price must be a valid number with up to 2 decimal digits!";
        } else {
            //Aizstājam komatus ar punktiem, ja tādi ir
            str_replace(',', '.', $newProduct['Price']);
            // Pārvēršam cenu par decimāldaļskaitli
            $newProduct['Price'] = floatval($newProduct['Price']);

            // Vēl pārbaudam, vai gadījumā nav iesniegta negatīva vērtība
            if ($newProduct['Price'] < 0) {
                $errorMessages['Price'] = "Price cannot have a negative value!";
            }
        }
    };

    // Pārbaudām, vai ir atlasīts reģistrēts produkta tips
    // un vai produkta tipa vērtības ir derīgas.
    // Tā kā ievaddati ir atkarīgi no tipa, katru jāpārbauda atsevišķi
    switch ($newProduct['Type']) {
        case 'DVD':
            $newProduct['Size'] = htmlspecialchars($_POST['Size']);
            if (empty($newProduct['Size'])) {
                $errorMessages['Size'] = "Disk size cannot be empty!";
            } elseif (!ctype_digit($newProduct['Size'])) {
                $errorMessages['Size'] = "Disk size must be a whole number!";
            } else {
                // Nepieciešams, jo var tikt nolasīts kā teksts
                $newProduct['Size'] = intval($newProduct['Size']);

                // Vēl pārbaudam, vai gadījumā nav iesniegta negatīva vērtība
                if ($newProduct['Size'] < 0) {
                    $errorMessages['Size'] = "Disk size cannot have a negative value!";
                }
            }
            break;

        case 'BCK':
            $newProduct['Weight'] = htmlspecialchars($_POST['Weight']);
            if (empty($newProduct['Weight'])) {
                $errorMessages['Weight'] = "Book weight cannot be empty!";
            } elseif (!ctype_digit($newProduct['Weight'])) {
                $errorMessages['Weight'] = "Book weight must be a whole number!";
            } else {
                // Nepieciešams, jo var tikt nolasīts kā teksts
                $newProduct['Weight'] = intval($newProduct['Weight']);

                // Vēl pārbaudam, vai gadījumā nav iesniegta negatīva vērtība
                if ($newProduct['Weight'] < 0) {
                    $errorMessages['Weight'] = "Book weight cannot have a negative value!";
                }
            }
            break;

        case 'FRN':
            // Tā kā te ir 3 vērtības, katrai no tām jāiziet cauri pārbaudei

            // Augstums
            $newProduct['fHeight'] = htmlspecialchars($_POST['Height']);
            if (empty($newProduct['fHeight'])) {
                $errorMessages['fHeight'] = "Furniture height cannot be empty!";
            } elseif (!ctype_digit($newProduct['fHeight'])) {
                $errorMessages['fHeight'] = "Furniture height must be a whole number!";
            } else {
                // Nepieciešams, jo var tikt nolasīts kā teksts
                $newProduct['fHeight'] = intval($newProduct['fHeight']);

                // Vēl pārbaudam, vai gadījumā nav iesniegta negatīva vērtība
                if ($newProduct['fHeight'] < 0) {
                    $errorMessages['fHeight'] = "Furniture height cannot have a negative value!";
                }
            }
            // Platums
            $newProduct['fWidth'] = htmlspecialchars($_POST['Width']);
            if (empty($newProduct['fWidth'])) {
                $errorMessages['fWidth'] = "Furniture width cannot be empty!";
            } elseif (!ctype_digit($newProduct['fWidth'])) {
                $errorMessages['fWidth'] = "Furniture width must be a whole number!";
            } else {
                // Nepieciešams, jo var tikt nolasīts kā teksts
                $newProduct['fWidth'] = intval($newProduct['fWidth']);

                // Vēl pārbaudam, vai gadījumā nav iesniegta negatīva vērtība
                if ($newProduct['fWidth'] < 0) {
                    $errorMessages['fWidth'] = "Furniture width cannot have a negative value!";
                }
            }
            // "Dziļums"
            $newProduct['fLength'] = htmlspecialchars($_POST['Length']);
            if (empty($newProduct['fLength'])) {
                $errorMessages['fLength'] = "Furniture length cannot be empty!";
            } elseif (!ctype_digit($newProduct['fLength'])) {
                $errorMessages['fLength'] = "Furniture length must be a whole number!";
            } else {
                // Nepieciešams, jo var tikt nolasīts kā teksts
                $newProduct['fLength'] = intval($newProduct['fLength']);

                // Vēl pārbaudam, vai gadījumā nav iesniegta negatīva vērtība
                if ($newProduct['fLength'] < 0) {
                    $errorMessages['fLength'] = "Furniture length cannot have a negative value!";
                }
            }
            break;

        default:
            if (empty($newProduct['Type'])) {
                $errorMessages['Type'] = "You must select a product type!";
            } else {
                $errorMessages['Type'] = "A valid product type must be selected!";
            }
            break;
    }
    //Skatamies, cik daudz kļūdas noteiktas
    if (empty($errorMessages)) {
        // Lieliski, nekādas kļūdas ievadē nav! Tātad varam sūtīt
        $addProduct = new $newProduct['Type']($newProduct);
        $sqlInsert = $addProduct->sqlSend();
        echo $sqlInsert;
        $connectDB = new database();
        $connectDB->sendCommands($sqlInsert, false);
        header("Location: http://scandistore.maskless.id.lv/");
    }
}
