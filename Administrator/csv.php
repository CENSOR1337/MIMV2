<?php
$CsvHandle = fopen("test.csv", "r");
$TargetString = array("Identify", "ชื่อ", "นามสกุล");
$SortingIndex = [];

$Return = [];
$Row = 1;
if (($CsvHandle) !== false) {
    $CsvData = fgetcsv($CsvHandle, 1000, ",");

    for ($i = 0; $i < count($TargetString); $i++) {
        if (array_search($TargetString[$i], $CsvData)) {
            array_push($SortingIndex, array_search($TargetString[$i], $CsvData));
        }
    }

    while (($CsvData = fgetcsv($CsvHandle, 1000, ",")) !== false) {

        $ResultArr = [];
        foreach ($SortingIndex as &$Value) {
            array_push($ResultArr,$CsvData[$Value]);
        }
        array_push($Return, $ResultArr);
    }

    foreach ($Return as &$Value) {
        echo $Value[0] . "<br>";
        echo $Value[1] . "<br>";
        echo $Value[2] . "<br>";
    }

    fclose($CsvHandle);
}
