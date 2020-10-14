<?php
session_start();
if ((isset($_SESSION['AdministratoAuth']))) {
     
    header("location: ./dashboard.php");
    return;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบสมัครใช้งานระบบอินเตอร์เน็ต</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>

    <!--===============================================================================================-->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/fullpage/fullpage.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic">
                    <div class="vertical-center">
                        <img src="../images/student.png" alt="IMG">
                        <span class="login100-form-title">
                            <br>
                            <font style="font-size: 18px;">ระบบลงทะเบียนใช้งานระบบอินเตอร์เน็ต</font><br>
                            <font style="font-size: 18px;">โรงเรียนเมืองยมวิทยาคาร</font><br>
                        </span>
                    </div>

                </div>

                <form action="" method="POST" class="login100-form validate-form">
                    <div id="FormFirst" class="vertical-center-form">
                        <span class="login100-form-title">
                            ระบบลงทะเบียน
                        </span>
                        <div class="wrap-input100 validate-input">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="username" type="text" class="validate">
                                    <label for="username">ชื่อผู้ใช้</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="validate">
                                    <label for="password">รหัสผ่าน</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <center>
                                        <button onclick="QueryLogin();" class="btn waves-effect waves-light deep-purple"
                                            type="button">เข้าสู่ระบบ</button>
                                    </center>
                                </div>
                            </div>
                        </div>

                </form>




            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="../vendor/fullpage/fullpage.js"></script>
    <script src="../vendor/jquery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <!--JavaScript at end of body for optimized loading-->
    <script>
        //// Notifications
        function NotifyError(text = "กรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง", title = 'เกิดข้อผิดพลาด') {

            Swal.fire({
                icon: 'error',
                title: title,
                text: text
            })

        }
    </script>
    <script>
        function QueryLogin() {

            username = document.getElementById('username').value;
            password = document.getElementById('password').value;

            if (username && password) {
                AjaxOBJ = $.ajax({
                    type: "POST",
                    url: "../PHPFunction/queryLogin.php",
                    error: function (ts) {
                        console.log(ts.responseText);
                    },
                    dataType: "json",
                    data: {

                        username: document.getElementById('username').value,
                        password: document.getElementById('password').value

                    }

                });

                AjaxOBJ.done(function (ResponsedMsg) {
                    console.log(ResponsedMsg);
                    if (ResponsedMsg) {
                        Swal.fire({
                            icon: 'success',
                            title: 'เข้าสู่ระบบสำเร็จ',
                            showConfirmButton: false,
                            timer: 2000
                        }).then((result) => {
                            window.location="./";
                        })
                    } else {
                        NotifyError('ไม่พบข้อมูลนี้');
                    }
                });
                AjaxOBJ.fail(function () {
                    NotifyError('เกิดข้อผิดพลาดในการเข้าสู่ระบบ');
                });
            }
        }
    </script>
</body>

</html>
