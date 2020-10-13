<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php

function InsertProfileIntoDB($ProfileArray)
{

    require_once "../config/connects.php";

    $InsertData = "'" . implode("'),('", array_map(function ($entry) {
        return implode("', '", $entry);
    }, $ProfileArray)) . "'";

    $sql = "INSERT INTO `AccessibleProfiles` (`IndentifyID`, `StudentID`, `Firstname`, `Lastname`)
    VALUES ($InsertData)";

    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

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
        $TargetString = array("รหัสประจำตัวประชาชน", "รหัสประจำตัวนักเรียน", "ชื่อ", "นามสกุล");
        $SortingIndex = [];
        $Return = [];

        if (($CsvHandle) !== false) {
            $CsvData = fgetcsv($CsvHandle, 1000, ",");

            for ($i = 0; $i < count($TargetString); $i++) {
                if ((array_search($TargetString[$i], $CsvData)) !== false) {
                    array_push($SortingIndex, (array_search($TargetString[$i], $CsvData)) !== false);
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

            InsertProfileIntoDB($Return);

            fclose($CsvHandle);
        }
    }
}
