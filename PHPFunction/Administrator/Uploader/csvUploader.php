<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/font.css">
</head>
<body>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function uploadDone(){

        Swal.fire({
        title: 'สำเร็จ',
        icon: 'success',
        showDenyButton: false,
        text : 'การอัปโหลดข้อมูลเสร็จสิ้น',
        showCancelButton: false,
        confirmButtonText: `ตกลง`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location = "../../../login/";
        } else {
            window.location = "../../../login/";
        }
        })
    }

    function uploadFailed(){

        Swal.fire({
        title: 'ผิดพลาด',
        icon: 'error',
        showDenyButton: false,
        text : 'การอัปโหลดผิดพลาดกรุณาลองใหม่อีกครั้ง',
        showCancelButton: false,
        confirmButtonText: `ตกลง`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location = "../../../login/";
        } else{
            window.location = "../../../login/";
        }
        })
    };


</script>

</html>

<?php

function InsertProfileIntoDB($ProfileArray)
{

    require_once "../../../config/connects.php";

    $InsertData = "'" . implode("'),('", array_map(function ($entry) {
        return implode("', '", $entry);
    }, $ProfileArray)) . "'";

    $sql = "INSERT INTO `AccessibleProfiles` (`IndentifyID`, `StudentID`, `Firstname`, `Lastname`)
    VALUES ($InsertData)";

    if ($conn->query($sql) === true) {
        echo '<script type="text/javascript">';
        echo 'uploadDone();';
        echo '</script>';

    } else {
        echo '<script type="text/javascript">';
        echo 'uploadFailed();';
        echo '</script>';

    }

}

$AccpetedExt = array("csv");
if (isset($_FILES['csvUpload'])) {
    if (isset($_FILES['csvUpload'])) {

        $File = $_FILES['csvUpload']['name'];
        $TempFile = $_FILES['csvUpload']['tmp_name'];
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

            InsertProfileIntoDB($Return);

            fclose($CsvHandle);
        }
    }
}
