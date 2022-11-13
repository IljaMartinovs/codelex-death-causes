<?php
require_once 'Row.php';

$data = [];
$index = 1;
if (($handle = fopen("vtmec-causes-of-death.csv", "r")) !== false) {
    while (($row = fgetcsv($handle, 1000)) !== false) {
        switch ($row[2]) {
            case "Vardarbīga nāve":
                $data[] = new Row([$row[2], $row[4], $row[5]]);
                break;
            case "Nevardarbīga nāve":
                $data[] = new Row([$row[2], $row[3]]);
                break;
            case "Nāves cēlonis nav noteikts":
                $data[] = new Row([$row[2]]);
        }
        $index++;
//        if($index > 30)
//            break;
    }
    fclose($handle);
}

$vardarbiga = 0; $varNave = [];// Vardarbīga nāve
$nevardarbiga = 0; $nevNave = [];// Nevardarbīga nāve
$nav_noteikts = 0; // Nāves cēlonis nav noteikts

for($i=0; $i < count($data); $i++) {
    if (count($data[$i]->getRow()) == 1)
        $nav_noteikts++;
    else if (count($data[$i]->getRow()) == 2) {
        $nevardarbiga++;
        array_push($nevNave,$data[$i]->getRow()[1]);
    }

    else if (count($data[$i]->getRow()) == 3){
        $vardarbiga++;
        array_push($varNave,$data[$i]->getRow()[1]);
    }

}

$nevNave = array_unique($nevNave);
$nevNave = array_values($nevNave);

$varNave = array_unique($varNave);
$varNave = array_values($varNave);

do {
    echo "\n1. Izvadīt nāves skaitu\n";
    echo "2. Izvadīt Nevardarbīga nāves detalizetaku informaciju\n";
    echo "3. Izvadīt Vardarbīga nāves detalizetaku informaciju\n";
    do {
        $inputSelect = (int)readline("Ievadiet ciparu (0-6): \n");
    } while ($inputSelect > 4 || $inputSelect < 0);

    switch ($inputSelect){
        case 1:
            echo "\nVardarbīga nāve - $vardarbiga\n";
            echo "Nevardarbīga nāve - $nevardarbiga\n";
            echo "Nāves cēlonis nav noteikts - $nav_noteikts\n";
            break;

        case 2:
            print_r($nevNave);
            break;
        case 3:
            print_r($varNave);
            break;
    }
} while ($inputSelect !== 0);
