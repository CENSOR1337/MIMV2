<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เอกสารยืนยันขอใช้งานระบบ</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/font.css">

</head>

<style>
    td,
    th {
        border: 1px solid gray;
    }
    @page { margin: 0; }
    @media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>

<script>
    function startprint(){

        if(true){
        window.print();
        setTimeout(window.close, 0);
    }
    };
</script>

<body onload="startprint()">
    <div class="container">

        <table>
            <thead>
                <tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center-align" height="150px">
                        <img width="150" src="https://mw.ac.th/Muangyom/wp-content/uploads/2019/03/cropped-logo-10.61-1.png" alt="">
                    </td>
                    <td class="center-align" colspan='3'>
                            <h6>แบบฟอร์มการขอใช้งานบริการอินเทอร์เน็ต<br>โรงเรียนเมืองยมวิทยาคาร</h6>

                    </td>
                </tr>

                <tr>
                    <td colspan="1" class="right-align"><b>เลขประจำตัวประชาชน : </b></td>
                    <td colspan="3"> <?php echo $_GET['identifyID']; ?> </td>
                </tr>
                <tr>
                    <td colspan="1" class="right-align"><b>เลขประจำตัวนักเรียน : </b></td>
                    <td colspan="3"> <?php echo $_GET['studentID']; ?> </td>
                </tr>
                <tr>
                    <td colspan="1" class="right-align"><b>ชื่อ - สกุล : </b></td>
                    <td colspan="3"> <?php echo $_GET['fullName']; ?> </td>
                </tr>
                <tr>
                    <td colspan="1" class="right-align"><b>วันเกิด : </b></td>
                    <td colspan="3"> <?php echo $_GET['birthDate']; ?> </td>
                </tr>
                <tr>
                    <td colspan="1" class="right-align"><b>อีเมล : </b></td>
                    <td colspan="3"> <?php echo $_GET['email']; ?> </td>
                </tr>
                <tr>
                    <td width="30%" class="right-align"><b>เพศ : </b></td>
                    <td width="23%"> <?php echo $_GET['gender']; ?> </td>
                    <td width="23%" class="right-align"><b>ปีการศึกษา : </b></td>
                    <td width="22%"> <?php echo $_GET['academicYear']; ?> </td>
                </tr>
                <tr>
                    <td class="right-align"><b>ประเภทผู้ใช้ : </b></td>
                    <td > <?php echo $_GET['status']; ?> </td>
                    <td class="right-align"><b>สถานะ : </b></td>
                    <td> <?php echo $_GET['permission']; ?> </td>
                </tr>
                <tr>
                    <td class="right-align"><b>มัธยมศึกษาปีที่ : </b></td>
                    <td> <?php echo $_GET['studentYear']; ?> </td>
                    <td class="right-align"><b>ห้องที่ : </b></td>
                    <td> <?php echo $_GET['room']; ?> </td>
                </tr>
                <tr>
                    <td colspan="4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้ามีความประสงค์จะขอใช้งานอินเทอร์เน็ตโดยผ่ายเครือยข่ายของโรงเรียนเมืองยมวิทยาคารและขอยืนยันว่าจะปฏิบัติตามพระราชบัญญัติว่าด้วยการกระทำความผิดเกี่ยวกับคอมพิวเตอร์
                        พุทธศักราช 2550 อย่างเคร่งครัด
                    </td>
                </tr>
                <tr>

                    <td colspan="2" class="center-align" height="150px" width="50%"><br><br>
                        ลงชื่อ............................................................<br><br>
                        (............................................................)<br>(ผู้ขอใช้บริการ)<br>วันที่................/................/................</td>
                    <td colspan="2" class="center-align" width="50%"><br><br>
                        ลงชื่อ............................................................<br><br>
                        (............................................................)<br>(ผู้อำนวยการ)<br>วันที่................/................/................</td>
                </tr>
            </tbody>
        </table>


    </div>
</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</html>
