<?php

$AccpetedExt = array("csv");
if ($_POST) {
    if (isset($_FILES['upload'])) {

        $File = $_FILES['upload']['name'];
        $TempFile = $_FILES['upload']['tmp_name'];
        $ext = explode(".", $File);
        $ext = $ext[count($ext) - 1];
    }
    if (in_array($ext, $AccpetedExt)) {

        $CsvHandle = fopen($TempFile, "r");
        $TargetString = array("เลขประจำตัวประชาชน", "Identify", "เลขประจำตัวนักเรียน", "ชื่อ", "นามสกุล");
        $SortingIndex = [];
        $Return = [];

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
                    if (!(empty($CsvData[$Value]))) {
                        array_push($ResultArr, $CsvData[$Value]);
                    }
                }
                if (!(empty($CsvData[$Value]))) {
                    array_push($Return, $ResultArr);
                }
            }

            foreach ($Return as &$Value) {
                for ($i = 0; $i < count($SortingIndex); $i++) {
                    echo $Value[$i] . " ";
                }
                echo "<br>";
            }

            fclose($CsvHandle);
        }
    }
}
