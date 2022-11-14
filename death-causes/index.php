<?php

require_once "Data.php";
require_once "DataCollection.php";

$allData = new DataCollection();

$index = 1;

if (($handle = fopen("vtmec-causes-of-death.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000)) !== false) {

        $num = count($data);
        $index++;
        if ($index === 2) {
            continue;
        }
        $allData->addData(new Data(
            $data[2],
            (array_filter(explode(";",$data[3]))),
            (array_filter(explode(";",$data[4]))),
           (array_filter(explode(";",$data[5]))),
        ));

    }
    fclose($handle);
}

$deathReasons = [];

foreach ($allData->deathReasonCounter() as $key => $value) {
    $deathReasons[] = "$key - $value";
}
echo $deathReasons[1] . PHP_EOL;
echo "----------------------------------\n";
echo $deathReasons[0] . PHP_EOL;
echo "----------------------------------\n";

foreach ($allData->nonViolentCounter() as $key => $value){
    echo "$key - $value" . PHP_EOL;
}

echo "----------------------------------\n";
echo $deathReasons[2] . PHP_EOL;
echo "----------------------------------\n";

foreach ($allData->violentDeathCounter() as $key => $value){
    echo "$key - $value" . PHP_EOL;
}
foreach ($allData->violentDeathCounter() as $key => $value){
    echo "$key - $value" . PHP_EOL;
}