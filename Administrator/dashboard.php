<?php
session_start();
require '../config/config.php';
if (!($Debug)) {
    if (!(isset($_SESSION['AdministratorAuth']))) {
        header("location: ./index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบอินเตอร์เน็ตโรงเรียนเมืองยมวิทยาคาร</title>
  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->
  <!-- CORE CSS-->
  <link href="css//materialize.css" type="text/css" rel="stylesheet">
  <link href="css//style.css" type="text/css" rel="stylesheet">
  <!-- Custome CSS-->
  <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
  <link href="vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<style>
  .selected {
    background-color: #cfd8dc;
  }

  .large-icon {
    font-size: 30px !important;
  }
</style>

<body>
  <!-- Start Page Loading -->
  <!--
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>-->
  <!-- End Page Loading -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START HEADER -->
  <header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
      <nav class="navbar-color gradient-45deg-light-blue-cyan">
        <div class="nav-wrapper">
          <ul class="left">
            <li>
              <h1 class="logo-wrapper">
                <a href="index.html" class="brand-logo darken-1">
                  <img src="./images/logo/MIM_logo.png" alt="materialize logo">
                  <span class="logo-text hide-on-med-and-down">2.0.0</span>
                </a>
              </h1>
            </li>
          </ul>
          <div class="header-search-wrapper hide-on-med-and-down">
            <i class="material-icons">search</i>
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="ค้นหา" />
          </div>
<!--
          <ul class="right hide-on-med-and-down">
            <li>
              <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button"
                data-activates="profile-dropdown">
                <span class="avatar-status avatar-online">
                  <img src="images/avatar/avatar-7.png" alt="avatar">
                  <i></i>
                </span>
              </a>
            </li>
            <li>
-->
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- end header nav-->
  </header>
  <!-- END HEADER -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
          <li class="user-details cyan darken-2">
            <div class="row">
              <div class="col col s4 m4 l4">
                <!--<img src="images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">-->
              </div>
              <div class="col col s8 m8 l8">
                <a class="white-text profile-btn"><?php echo $_SESSION['AdministratorAuth']?><i
                    class="mdi-navigation-arrow-drop-down right"></i></a>
                <p class="user-roal">ผู้ดูแลระบบ</p>
              </div>
            </div>
          </li>
          <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
              <li class="bold">
                <a onclick="changeContent('dashboard');" class="waves-effect waves-cyan">
                  <i class="material-icons">dashboard</i>
                  <span class="nav-text">แดชบอร์ด</span>
                </a>
              </li>
              <li class="bold">
                <a onclick="changeContent('ProfilesInfoTable');" class="waves-effect waves-cyan">
                  <i class="material-icons">supervisor_account</i>
                  <span class="nav-text">ข้อมูลโปรไฟล์</span>
                </a>
              </li>
              <li class="bold">
                <a onclick="changeContent('RegisterTableInfos');" class="waves-effect waves-cyan">
                  <i class="material-icons">how_to_reg</i>
                  <span class="nav-text">ข้อมูลการลงทะเบียน</span>
                </a>
              </li>

              <li class="bold">
                <a onclick="changeContent('DataManagement');" class="waves-effect waves-cyan">
                  <i class="material-icons">source</i>
                  <span class="nav-text">การจัดการ</span>
                </a>
              </li>
              <li class="divider"></li>
              <!--
              <li class="bold">
                <a href="#" class="waves-effect waves-cyan">
                  <i class="material-icons">account_box</i> โปรไฟล์ผู้ใช้</a>
              </li>
              -->
              <li class="bold">
                <a onclick="Logout();" class="waves-effect waves-cyan">
                  <i class="material-icons">exit_to_app</i>
                  <span class="nav-text">ออกจากระบบ</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <a href="#" data-activates="slide-out"
          class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
          <i class="material-icons">menu</i>
        </a>
      </aside>
      <!-- END LEFT SIDEBAR NAV-->
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START CONTENT -->
      <div class="container">
        <section id="content">
          <div id="dashboard" style="display: none;">
            <div id="card-stats">
              <div class="row mt-1">
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">supervised_user_circle</i>
                        <p>ผู้มีสิทธิ์</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 id="AccessibleProfilesDashboard" class="mb-0">0</h5>
                        <p class="no-margin">บัญชี</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">check_circle</i>
                        <p>ลงทะเบียน</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 id="RegisteredDashboard" class="mb-0">0</h5>
                        <p class="no-margin">บัญชี</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>รอการยืนยัน</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 id="pendingDashboard" class="mb-0">80%</h5>
                        <p class="no-margin">บัญชี</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                      <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">error</i>
                        <p>ระงับใช้</p>
                      </div>
                      <div class="col s5 m5 right-align">
                        <h5 id="SuspendedDashboard" class="mb-0">0</h5>
                        <p class="no-margin">บัญชี</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Profile info table -->
          <div id="ProfilesInfoTable" style="display: none;">
            <div class="section">
              <div class="col s12">

                <div class="row">
                  <div id="admin" class="col s12">
                    <div class="card material-table">

                      <div class="table-header">
                        <span class="table-title">ข้อมูลโปรไฟล์ </span>
                        <div class="actions">
                          <div class="row">
                            <div class="input-field col">
                              <center>
                                <a id="updateDatatable_0" onclick="QueryProfileInfo(true);"
                                  class="waves-effect waves-light btn"><i
                                    class="material-icons left white-text">sync</i>อัปเดตข้อมูล</a>
                              </center>
                            </div>
                            <div class="input-field col">
                              <center>
                                <a onclick="doAddProfile();" class="waves-effect waves-light btn"><i
                                    class="material-icons left white-text">add</i>เพิ่มข้อมูล</a>
                              </center>
                            </div>
                            <div class="input-field col">
                              <center>
                                <a id="SelectedProfile" onclick="deleteSelectedProfiles();"
                                  class="profile-button waves-effect waves-light btn"><i
                                    class="material-icons left white-text">delete</i>เลือกข้อมูลที่ต้องการเพื่อลบ </a>
                              </center>
                            </div>
                            <div class="input-field col">
                              <center>
                                <a class="search-toggle waves-effect btn-flat nopadding"><i
                                    class="material-icons left">search</i>ค้นหาข้อมูล</a>
                              </center>
                            </div>
                          </div>

                        </div>
                      </div>
                      <table class="display responsive-table" id="Datatable_0" style="padding-top: 25px;">
                        <thead>
                          <th class="center">สถานะการยืนยัน</th>
                          <th class="">รหัสประจำตัวประชาชน</th>
                          <th class="">ชื่อ</th>
                          <th class="">นามสกุล</th>
                          <th class="">ประเภทผู้ใช้</th>
                          <th class="">รหัสนักเรียน</th>
                          <th style="width: 85px;" class="center">แก้ไข</th>
                          <th style="width: 85px;" class="center">ลบ</th>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END of Profile info table -->

          <!-- Profile Register table -->
          <div id="RegisterTableInfos" style="display: none;">
            <div class="section">
              <div class="col s12">
                <div class="row">
                  <div id="admin" class="col s12">
                    <div class="card material-table">
                      <div class="table-header">
                        <span class="table-title">ข้อมูลการลงทะเบียน</span>
                        <div class="actions">
                          <div class="row">
                            <div class="input-field col">
                              <center>
                                <a id="updateDatatable_1" onclick="QueryRegisterInfos(true);"
                                  class="waves-effect waves-light btn"><i
                                    class="material-icons left white-text">sync</i>อัปเดตข้อมูล</a>
                              </center>
                            </div>
                            <div class="input-field col">
                              <center>
                                <a id="SelectedRegister" onclick="deleteSelectedRegister();"
                                  class="profile-button waves-effect waves-light btn"><i
                                    class="material-icons left white-text">delete</i>เลือกข้อมูลที่ต้องการเพื่อลบ </a>
                              </center>
                            </div>
                            <div class="input-field col">

                              <center>
                                <a class="search-toggle waves-effect btn-flat nopadding"><i
                                    class="material-icons left">search</i>ค้นหาข้อมูล</a>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                      <table class="display" id="Datatable_1" style="padding-top: 25px;">
                        <thead>
                          <th>สถานะ</th>
                          <th>รหัสประจำตัวประชาชน</th>
                          <th>ชื่อ</th>
                          <th>นามสกุล</th>
                          <th>ชั้นปี</th>
                          <th>ห้องเรียน</th>
                          <th>ประเภทผู้ใช้</th>
                          <th style="width: 85px;" class="center">ตรวจสอบ</th>
                          <th style="width: 85px;" class="center">แก้ไข</th>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END of Register info table -->
          <div id="DataManagement" style="display: none;">

            <div class="row">
              <div class="col s12 m6">
                <form action="">
                  <div id="CsvUploader"
                    class="waves-effect waves-block waves-light card gradient-shadow gradient-45deg-light-blue-cyan border-radius-3 animate fadeUp">
                    <div class="card-content center">
                      <span class="material-icons white-text" style="font-size: 200px;">
                        publish
                      </span>
                      <h5 class="white-text lighten-4 center-align">นำเข้าข้อมูลโปรไฟล์</h5>
                      <p class="white-text lighten-4 center-align">ผ่านไฟล์ (.csv)</p>

                    </div>
                  </div>
                </form>
              </div>
              </form>
              <div class="col s12 m6">
                <div
                  class="waves-effect waves-block waves-light card gradient-shadow gradient-45deg-red-pink border-radius-3 animate fadeUp">
                  <div onclick="wipeProfileData();" class="card-content center">
                    <span class="material-icons white-text" style="font-size: 200px;">
                      delete
                    </span>
                    <h5 class="white-text lighten-4 center-align">ลบข้อมูลทั้งหมด</h5>
                    <p class="white-text lighten-4 center-align">ลบข้อมูลโปรไฟล์ทั้งหมด</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END of Register info table -->
      </div>
    </div>
  </div>
  <!--end container-->
  </section>
  <!-- END CONTENT -->
  <!-- START RIGHT SIDEBAR NAV-->
  <!-- END RIGHT SIDEBAR NAV-->
  </div>
  <!-- END WRAPPER -->
  </div>
  <!-- END MAIN -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START FOOTER -->
  <!--
  <footer class="page-footer gradient-45deg-light-blue-cyan">
    <div class="footer-copyright">
      <div class="container">
        <span>ระบบอินเตอร์เน็ตโรงเรียนเมืองยมวิทยาคาร @
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> <a class="grey-text text-lighten-2"
            href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank"></a></span>
        <span class="right hide-on-small-only">&nbsp;ดีไซน์โดย <a class="grey-text text-lighten-2"
            href="https://pixinvent.com/">PIXINVENT</a></span>
        <span class="right hide-on-small-only"> ออกแบบระบบโดย <a class="grey-text text-lighten-2"
            href="https://github.com/CENSOR1337">เมธี ตนะทิพย์, </a> <a class="grey-text text-lighten-2">กษินนท์
            วัดบุญเลี้ยง</a></span></span>

-->
  </div>
  </div>
  </footer>

  <!-- Hidden Content -->
  <form id="FormUploader" action="../PHPFunction/Administrator/Uploader/csvUploader.php" method="post"
    enctype="multipart/form-data" style="display: block;">
    <input type="file" id="csvUpload" name="csvUpload" accept=".csv">
  </form>

  <!-- END FOOTER -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src='https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js'></script>
  <script src='https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>

  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.js"></script>
  <!--custom-script.js - Add your own theme custom JS-->
  <script type="text/javascript" src="js/custom-script.js"></script>
  <script>
    $('#CsvUploader').click(function () {
      $('#csvUpload').trigger('click');
    });
    $("#csvUpload").change(function () {
      $('#FormUploader').trigger('submit');
    });
  </script>
  <script>
    // Tools for myself

    function parameterAppend(Array) {
      result = '(';
      for (let index = 0; index < Array.length; index++) {
        const element = Array[index];
        if (element == 'event') {
          result += element + ',';
        } else {
          if (index == (Array.length) - 1) {
            result += "'" + element + "'";
          } else {
            result += "'" + element + "',";
          }
        }
      }
      result += ')';
      return result;
    }
  </script>
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
    // Management
    function wipeProfileData() {
      Swal.fire({
        icon: 'warning',
        title: 'ต้องการลบข้อมูลทั้งหมดหรือไม่',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ตกลง'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'error',
            title: 'ข้อมูลทั้งหมดจะหายไป',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ตกลง'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                icon: 'error',
                title: 'ยืนยันการลืมข้อมูลทั้งหมด',
                showConfirmButton: true,
                confirmButtonColor: '#d33',
                showCancelButton: true,
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ลบข้อมูลทั้งหมด'
              }).then((result) => {
                if (result.isConfirmed) {
                  AjaxOBJ = $.ajax({
                    type: "POST",
                    url: "../PHPFunction/Administrator/deleteAllData.php",
                    error: function (ts) {
                      console.log(ts.responseText);
                    },
                    dataType: "json"

                  });

                  AjaxOBJ.done(function (ResponsedMsg) {
                    console.log(ResponsedMsg);
                    if (ResponsedMsg) {
                      Swal.fire({
                        icon: 'success',
                        title: 'ลบข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                      }).then((result) => {})
                    } else {

                      NotifyError('เกิดข้อผิดพลาดในการลบข้อมูลกรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง');

                    }
                  });
                  AjaxOBJ.fail(function () {
                    NotifyError('เกิดข้อผิดพลาดในการลบข้อมูลกรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง');
                  });

                }
              })

            }
          })

        }
      })
    }
  </script>
  <script>
    // Action scirpt Profile

    function doEditRegister(event, IdentifyID, StudentID, Firstname, Lastname, BirthDate, Email, Gender,
      AcademicYear, Role,
      Permission, Degree, Room) {
      event.stopPropagation();
      BirthDate = BirthDate.split('-');
      months_th = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม",
        "สิงหาคม", "กันยายน",
        "ตุลาคม", "พฤศจิกายน", "ธันวาคม",
      ];


      editChain = [{
          title: 'เลขประจำตัวประชาชน',
          inputValue: IdentifyID,
          text: 'กรอกหมายเลขที่ต้องการแก้ไข'
        },
        {
          title: 'เลขประจำตัวนักเรียน',
          inputValue: StudentID,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข'
        },
        {
          title: 'ชื่อ',
          inputValue: Firstname,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข'
        },
        {
          title: 'นามสกุล',
          inputValue: Lastname,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข'
        }, {
          title: 'วันเกิด',
          inputValue: parseInt(BirthDate[2]),
          text: 'กรุณากรอกวันเกิด'

        }, {
          title: 'เดือน',
          input: 'select',
          inputValue: Role,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข',
          inputOptions: {
            '1': 'มกราคม',
            '2': 'กุมภาพันธ์',
            '3': 'มีนาคม',
            '4': 'เมษายน',
            '5': 'พฤษภาคม',
            '6': 'มิถุนายน',
            '7': 'กรกฎาคม',
            '8': 'สิงหาคม',
            '9': 'กันยายน',
            '10': 'ตุลาคม',
            '11': 'พฤศจิกายน',
            '12': 'ธันวาคม'
          }
        }, {
          title: 'ปีเกิด',
          inputValue: parseInt(BirthDate[0]) + 543,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข'
        },
        {
          title: 'อีเมล',
          inputValue: Email,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข'
        },
        {
          title: 'เพศ',
          input: 'select',
          inputValue: Role,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข',
          inputOptions: {
            'male': 'ชาย',
            'female': 'หญิง'
          }
        },
        {
          title: 'ปีการศึกษา',
          inputValue: parseInt(AcademicYear) + 543,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข'
        },
        {
          title: 'ประเภทผู้ใช้',
          inputValue: Role,
          input: 'select',
          text: 'กรอกข้อมูลที่ต้องการแก้ไข',
          inputOptions: {
            'student': 'นักเรียน',
            'personnel': 'ผู้ดูแล'
          }

        },
        {
          title: 'สถานะการใช้งาน',
          input: 'select',
          inputValue: Role,
          text: 'กรอกข้อมูลที่ต้องการแก้ไข',
          inputOptions: {
            'pending': 'รอการดำเนินการ',
            'verified': 'ยืนยันแล้ว',
            'suspended': 'ระงับใช้งาน'
          }
        },
        {
          title: 'มัธยมปีที่',
          text: 'กรอกข้อมูลที่ต้องการแก้ไข',
          inputValue: Degree,
        },
        {
          title: 'ห้องที่',
          text: 'กรอกข้อมูลที่ต้องการแก้ไข',
          inputValue: Room,
        },

      ];
      console.log(editChain.length);

      Swal.fire({
        title: Firstname + ' ' + Lastname,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `ใช่`,
        denyButtonText: `ไม่`,
        cancelButtonText: "ยกเลิก",
        text: 'ต้องการที่จะแก้ไขข้อมูลนี้หรือไม่',
      }).then((result) => {
        if (result.isConfirmed) {


          answers = {};
          Swal.mixin({
            input: 'text',
            confirmButtonText: 'ต่อไป',
            cancelButtonText: 'ยกเลิก',
            showCancelButton: true,
          }).queue(editChain).then((result) => {
            if (result.value) {
              answers = (result.value)



              BirthDateNew = parseInt(answers[4]) + " " + months_th[parseInt(answers[5]) - 1] + " " + (parseInt(
                answers[6]));
              Gender = (answers[8] == "male" ? 'ชาย' : 'หญิง');

              switch (answers[10]) {
                case 'personnel':
                  Role = 'บุคลากร';
                  break;

                case 'student':
                  Role = 'นักเรียน';
                  break;
              }

              switch (answers[11]) {
                case 'pending':
                  Permission = 'รอการยืนยัน';
                  break;

                case 'verified':
                  Permission = 'ยืนยันเรียบร้อยแล้ว';
                  break;

                case 'suspended':
                  Permission = 'ระงับการใช้งาน';
                  break;
              }


              Swal.fire({
                title: 'ข้อมูลการแก้ไข',
                confirmButtonText: 'เสร็จสิ้น',
                customClass: 'swal-wide',
                html: '<div>' +
                  '    <div class="container">' +
                  '        <table class="highlight">' +
                  '            <table>' +
                  '                <thead>' +
                  '                    <tr>' +
                  '                    </tr>' +
                  '                </thead>' +
                  '                <tbody>' +
                  '                    <tr>' +
                  '                        <td colspan="1" class="right-align"><b>เลขประจำตัวประชาชน : </b></td>' +
                  '                        <td colspan="3">' + answers[0] + '</td>' +
                  '                    </tr>' +
                  '                    <tr>' +
                  '                        <td colspan="1" class="right-align"><b>เลขประจำตัวนักเรียน : </b></td>' +
                  '                        <td colspan="3">' + answers[1] + '</td>' +
                  '                    </tr>' +
                  '                    <tr>' +
                  '                        <td colspan="1" class="right-align"><b>ชื่อ - สกุล : </b></td>' +
                  '                        <td colspan="3">' + answers[2] + ' ' + answers[3] + '</td>' +
                  '                    </tr>' +
                  '                    <tr>' +
                  '                        <td colspan="1" class="right-align"><b>วันเกิด : </b></td>' +
                  '                        <td colspan="3">' + BirthDateNew + '</td>' +
                  '                    </tr>' +
                  '                    <tr>' +
                  '                        <td colspan="1" class="right-align"><b>อีเมล : </b></td>' +
                  '                        <td colspan="3">' + answers[7] + '</td>' +
                  '                    </tr>' +
                  '                    <tr>' +
                  '                        <td class="right-align"><b>เพศ : </b></td>' +
                  '                        <td>' + Gender + '</td>' +
                  '                        <td class="right-left"><b>ปีการศึกษา : </b></td>' +
                  '                        <td>' + answers[9] + '</td>' +
                  '                    </tr>' +
                  '                    <tr>' +
                  '                        <td class="right-align"><b>ประเภทผู้ใช้ : </b></td>' +
                  '                        <td>' + Role + '</td>' +
                  '                        <td class="right-left"><b>สถานะ : </b></td>' +
                  '                        <td>' + Permission + '</td>' +
                  '                    </tr>' +
                  '                    <tr>' +
                  '                        <td class="right-align"><b>มัธยมปีที่ : </b></td>' +
                  '                        <td>' + answers[12] + '</td>' +
                  '                        <td class="right-left"><b>ห้องที่ : </b></td>' +
                  '                        <td>' + answers[13] + '</td>' +
                  '                    </tr>' +
                  '                </tbody>' +
                  '            </table>' +
                  '        </table>' +
                  '    </div>' +
                  '</div>',

              }).then((result) => {
                if (result.isConfirmed) {
                  if (!answers[0] || !answers[1] || !answers[2] || !answers[3] || !answers[4] || !answers[
                      5] || !answers[6] || !answers[7] || !answers[8] || !answers[9] || !answers[10] || !
                    answers[11] || !answers[12] || !answers[13]) {
                    NotifyError('กรุณากรอกข้อมูลให้ครบถ้วน');

                    return;
                  }
                  console.log(answers);
                  AjaxOBJ = $.ajax({
                    type: "POST",
                    url: "../PHPFunction/Administrator/Register/editRegisterinfo.php",
                    error: function (ts) {
                      console.log(ts.responseText);
                    },
                    dataType: "json",
                    data: {
                      toEditIndentifyID: IdentifyID,
                      IdentifyID: answers[0],
                      StudentID: answers[1],
                      Firstname: answers[2],
                      Lastname: answers[3],
                      BirthDate: (parseInt(answers[6]) - 543) + '-' + answers[5] + '-' + answers[4],
                      Email: answers[7],
                      Gender: answers[8],
                      AcademicYear: answers[9],
                      Status: answers[10],
                      Permission: answers[11],
                      Degree: answers[12],
                      Room: answers[13]

                    }

                  });

                  AjaxOBJ.done(function (ResponsedMsg) {
                    console.log(ResponsedMsg);
                    if (ResponsedMsg) {
                      Swal.fire({
                        icon: 'success',
                        title: 'แก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                      }).then((result) => {
                        if (!(result.isConfirmed)) {
                          QueryProfileInfo();
                        }
                      })
                    } else {

                      NotifyError('เกิดข้อผิดพลาดในการแก้ไขข้อมูลกรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง');

                    }
                  });
                  AjaxOBJ.fail(function () {
                    NotifyError('เกิดข้อผิดพลาดในการแก้ไขข้อมูลกรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง');
                  });

                }
              })
            }
          })

        } else if (result.isDenied) {} else {}
      })


    };


    function ViewRegisterInfo(event, IndentifyID, StudentID, Firstname, Lastname, BirthDate, Email, Gender,
      AcademicYear, Role,
      Permission, Degree, Room) {

      event.stopPropagation();


      if (!IndentifyID) {
        return;
      }

      months_th = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน",
        "ตุลาคม", "พฤศจิกายน", "ธันวาคม",
      ];

      BirthDate = BirthDate.split('-');
      BirthDate = parseInt(BirthDate[2]) + " " + months_th[parseInt(BirthDate[1])] + " " + (parseInt(BirthDate[0]) +
        543);

      Gender = (Gender == "male" ? 'ชาย' : 'หญิง');

      switch (Role) {
        case 'personnel':
          Role = 'บุคลากร';
          break;

        case 'student':
          Role = 'นักเรียน';
          break;
      }

      switch (Permission) {
        case 'pending':
          Permission = 'รอการยืนยัน';
          break;

        case 'verified':
          Permission = 'ยืนยันเรียบร้อยแล้ว';
          break;

        case 'suspended':
          Permission = 'ระงับการใช้งาน';
          break;
      }



      Swal.fire({
        title: 'ข้อมูลการลงทะเบียน',
        confirmButtonText: 'เสร็จสิ้น',
        customClass: 'swal-wide',
        html: '<div>' +
          '    <div class="container">' +
          '        <table class="highlight">' +
          '            <table>' +
          '                <thead>' +
          '                    <tr>' +
          '                    </tr>' +
          '                </thead>' +
          '                <tbody>' +
          '                    <tr>' +
          '                        <td colspan="1" class="right-align"><b>เลขประจำตัวประชาชน : </b></td>' +
          '                        <td colspan="3">' + IndentifyID + '</td>' +
          '                    </tr>' +
          '                    <tr>' +
          '                        <td colspan="1" class="right-align"><b>เลขประจำตัวนักเรียน : </b></td>' +
          '                        <td colspan="3">' + StudentID + '</td>' +
          '                    </tr>' +
          '                    <tr>' +
          '                        <td colspan="1" class="right-align"><b>ชื่อ - สกุล : </b></td>' +
          '                        <td colspan="3">' + Firstname + ' ' + Lastname + '</td>' +
          '                    </tr>' +
          '                    <tr>' +
          '                        <td colspan="1" class="right-align"><b>วันเกิด : </b></td>' +
          '                        <td colspan="3">' + BirthDate + '</td>' +
          '                    </tr>' +
          '                    <tr>' +
          '                        <td colspan="1" class="right-align"><b>อีเมล : </b></td>' +
          '                        <td colspan="3">' + Email + '</td>' +
          '                    </tr>' +
          '                    <tr>' +
          '                        <td class="right-align"><b>เพศ : </b></td>' +
          '                        <td>' + Gender + '</td>' +
          '                        <td class="right-left"><b>ปีการศึกษา : </b></td>' +
          '                        <td>' + AcademicYear + '</td>' +
          '                    </tr>' +
          '                    <tr>' +
          '                        <td class="right-align"><b>ประเภทผู้ใช้ : </b></td>' +
          '                        <td>' + Role + '</td>' +
          '                        <td class="right-left"><b>สถานะ : </b></td>' +
          '                        <td>' + Permission + '</td>' +
          '                    </tr>' +
          '                    <tr>' +
          '                        <td class="right-align"><b>มัธยมปีที่ : </b></td>' +
          '                        <td>' + Degree + '</td>' +
          '                        <td class="right-left"><b>ห้องที่ : </b></td>' +
          '                        <td>' + Room + '</td>' +
          '                    </tr>' +
          '                </tbody>' +
          '            </table>' +
          '        </table>' +
          '    </div>' +
          '</div>',

      })
    };
  </script>

  <script>
    function QueryProfileInfo(isRecall = false) {
      $('#Datatable_0').DataTable().rows().remove().draw();
      updateAllData();
      AjaxOBJ = $.ajax({
        type: "POST",
        url: "../PHPFunction/Administrator/queryProfileInfos.php",
        error: function (ts) {
          alert(ts.responseText);
        }, // or console.log(ts.responseText)
        dataType: "json",
        data: {
          AdminID: "WOW" // AdminAuth
        }
      });

      AjaxOBJ.done(function (ResponsedMsg) {
        if (ResponsedMsg) {

          Verified = '<center><span class="chip green lighten-5">' +
            '<span class="green-text">ลงทะเบียนแล้ว</span>' +
            '</span></center>';
          NotVerified = '<center><span class="chip red lighten-5">' +
            '<span class="red-text">ไม่ได้ลงทะเบียน</span>' +
            '</span></center>';

          row = new Array();

          ResponsedMsg.forEach(element => {
            Status = (element['RegisterStatus'] ? Verified : NotVerified);

            EditParameter = parameterAppend(['event', element['IndentifyID'], element['Firstname'], element[
              'Lastname'], element['Status'], element['StudentID']]);
            DeleteParameter = parameterAppend(['event', element['IndentifyID'], element['Firstname'], element[
              'Lastname']]);

            Edit = '<center><a href="#" onclick="doEditProfile' + EditParameter +
              ';"><i class="material-icons large-icon cyan-text">edit</i></a></center>';
            Delete =
              '<center><a href="#" onclick="doDeleteProfile ' + DeleteParameter +
              ';"><i class="material-icons large-icon red-text">delete</i></a></center>';

            row.push([Status, element['IndentifyID'], element['Firstname'], element['Lastname'], (element[
                'Status'] == 'student' ? "นักเรียน" : "บุคลากร"),
              element['StudentID'], Edit, Delete
            ]);
          });

          AddIntoTatable("Datatable_0", row);
          if (isRecall) {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: false,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })

            Toast.fire({
              icon: 'success',
              title: 'อัปเดตข้อมูลเรียบร้อยแล้ว'
            })
          }
        } else {}
      });
      AjaxOBJ.fail(function () {
        alert('failed');
      });

    };



    function doAddProfile() {
      answers = {};
      Swal.mixin({
        input: 'text',
        confirmButtonText: 'ต่อไป',
        cancelButtonText: 'ยกเลิก',
        showCancelButton: true,
        progressSteps: ['1', '2', '3', '4', '5']
      }).queue([{
          title: 'รหัสประจำตัวประชาชน'
        },
        'ชื่อ',
        'นามสกุล',
        {
          title: 'ประเภทผู้ใช้',
          input: 'select',
          inputOptions: {
            'student': 'นักเรียน',
            'personnel': 'บุคลากร'
          }
        }, {
          title: 'รหัสนักเรียน',
          text: 'หากเป็นบุคลากรไม่จำเป็นต้องใส่'
        }
      ]).then((result) => {
        if (result.value) {
          answers = (result.value)
          Swal.fire({
            title: 'เพิ่มข้อมูล',

            html: "<table border='1' style='border: 0%;'>" +
              "<tr>" +
              "<td  class='right'>รหัสประจำตัวประชาชน :&nbsp;</td>" +
              "<td  id='MismatchName' align='left'>&nbsp;" + answers[0] + "</td>" +
              "</tr>" +
              "<tbody>" +
              "<tr>" +
              "<td class='right'>ชื่อสกุล :&nbsp;</td>" +
              "<td id='FormMismatchName' align='left'>&nbsp;" + answers[1] + ' ' + answers[2] + "</td>" +
              "</tr>" +
              "<tr>" +
              "<td class='right'>ประเภทผู้ใช้ :&nbsp;</td>" +
              "<td id='FormMismatchName' align='left'>&nbsp;" + (answers[3] === 'student' ? 'นักเรียน' :
                'บุคลากร') + "</td>" +
              "</tr>" +
              "<tr>" +
              "<td class='right'>รหัสนักเรียน :&nbsp;</td>" +
              "<td id='FormMismatchName' align='left'>&nbsp;" + (answers[3] === 'student' ? answers[4] :
                answers[0]) + "</td>" +
              "</tr>" +
              "<tr>" +
              "<td colspan='2' align='center'>" +
              "<center>ต้องการเพิ่มข้อมูลเหล่านี้ใช่หรือไม่</center>" +
              "</td>" +
              "</tr>" +
              "</tbody>" +
              "</table>",



            confirmButtonText: 'ยืนยัน',
            showCancelButton: true,
            cancelButtonText: 'ยกเลิก'
          }).then((result) => {
            if (result.isConfirmed) {



              if (!answers[0] || !answers[1] || !answers[2] || !answers[3] || (answers[3] === 'student' ? (!
                  answers[4]) : (!answers[0]))) {
                NotifyError('กรุณากรอกข้อมูลให้ครบถ้วน');
                return;
              }
              AjaxOBJ = $.ajax({
                type: "POST",
                url: "../PHPFunction/Administrator/Profile/addProfileinfos.php",
                error: function (ts) {
                  console.log(ts.responseText);
                },
                dataType: "json",
                data: {
                  IdentifyID: answers[0],
                  Firstname: answers[1],
                  Lastname: answers[2],
                  Status: answers[3],
                  StudentID: (answers[3] === 'student' ? answers[4] : answers[0])
                }
              });

              AjaxOBJ.done(function (ResponsedMsg) {
                if (ResponsedMsg) {
                  Swal.fire({
                    icon: 'success',
                    title: 'เพิ่มข้อมูลสำเร็จ',
                    text: 'เพิ่มข้อมูลของ ' + answers[1] + ' ' + answers[2] + ' เรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) => {
                    if (!(result.isConfirmed)) {
                      QueryProfileInfo();
                    }
                  })
                } else {
                  alert("Failed");
                }
              });


              AjaxOBJ.fail(function () {
                NotifyError('เกิดข้อผิดพลาดในการเพิ่มข้อมูลกรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง');
              });


            }
          })
        }
      })
    }

    function doDeleteProfile(event, IdentifyID, Firstname, Lastname) {
      event.stopPropagation();
      Swal.fire({
        title: Firstname + ' ' + Lastname,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `ใช่`,
        denyButtonText: `ไม่`,
        cancelButtonText: "ยกเลิก",
        text: 'ต้องการที่จะลบข้อมูลนี้ใช่หรอไม่',
      }).then((result) => {
        if (result.isConfirmed) {

          AjaxOBJ = $.ajax({
            type: "POST",
            url: "../PHPFunction/Administrator/Profile/deleteProfileinfos.php",
            error: function (ts) {
              console.log(ts.responseText);
            },
            dataType: "json",
            data: {
              IdentifyID: IdentifyID
            }
          });

          AjaxOBJ.done(function (ResponsedMsg) {
            if (ResponsedMsg) {
              Swal.fire({
                icon: 'success',
                title: 'ลบข้อมูลสำเร็จ',
                text: 'ลบข้อมูลของ ' + Firstname + ' ' + Lastname + 'แล้ว',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                if (!(result.isConfirmed)) {
                  QueryProfileInfo();
                }
              })

            }
          });

          AjaxOBJ.fail(function () {
            alert(ResponsedMsg[0]);
          });
        } else if (result.isDenied) {} else {}
      })

    }

    function deleteSelectedRegister() {


      var table = $('#Datatable_1').DataTable();
      var data = table.rows('.selected').data();
      if (data.length <= 0) {

        Swal.fire({
          icon: 'info',
          title: 'เลือกข้อมูล',
          text: 'กรุณาเลือกข้อมูลที่ต้องการลบก่อน',
          confirmButtonText: 'ตกลง'
        })
        return;
      }
      Swal.fire({
        title: 'ลบข้อมูล',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `ใช่`,
        denyButtonText: `ไม่`,
        cancelButtonText: "ยกเลิก",
        text: 'ต้องการลบข้อมูลทั้งหมด' + ' ' + data.length + ' ' + 'ข้อมูลใช่หรือไม่',
      }).then((result) => {
        if (result.isConfirmed) {

          toDeleteArray = [];

          for (let i = 0; i < data.length; i++) {
            const element = data[i];
            toDeleteArray.push(data[i][1]);
          }

          AjaxOBJ = $.ajax({
            type: "POST",
            url: "../PHPFunction/Administrator/Profile/deleteSelectedProfileinfos.php",
            error: function (ts) {
              console.log(ts.responseText);
            },
            dataType: "json",
            data: {
              toDeleteArray: JSON.stringify(toDeleteArray)
            }
          });

          AjaxOBJ.done(function (ResponsedMsg) {
            if (ResponsedMsg) {
              Swal.fire({
                icon: 'success',
                title: 'ลบข้อมูลสำเร็จ',
                text: 'ลบข้อมูลทั้งหมด ' + data.length + ' ข้อมูลแล้ว',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                if (!(result.isConfirmed)) {
                  QueryRegisterInfos();
                }
              })

            }
          });

          AjaxOBJ.fail(function () {
            alert(ResponsedMsg[0]);
          });
        } else if (result.isDenied) {} else {}
      })

    }

    function deleteSelectedProfiles() {

      var table = $('#Datatable_0').DataTable();
      var data = table.rows('.selected').data();
      if (data.length <= 0) {

        Swal.fire({
          icon: 'info',
          title: 'เลือกข้อมูล',
          text: 'กรุณาเลือกข้อมูลที่ต้องการลบก่อน',
          confirmButtonText: 'ตกลง'
        })
        return;
      }
      Swal.fire({
        title: 'ลบข้อมูล',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `ใช่`,
        denyButtonText: `ไม่`,
        cancelButtonText: "ยกเลิก",
        text: 'ต้องการลบข้อมูลทั้งหมด' + ' ' + data.length + ' ' + 'ข้อมูลใช่หรือไม่',
      }).then((result) => {
        if (result.isConfirmed) {

          toDeleteArray = [];

          for (let i = 0; i < data.length; i++) {
            const element = data[i];
            toDeleteArray.push(data[i][1]);
          }

          AjaxOBJ = $.ajax({
            type: "POST",
            url: "../PHPFunction/Administrator/Profile/deleteSelectedProfileinfos.php",
            error: function (ts) {
              console.log(ts.responseText);
            },
            dataType: "json",
            data: {
              toDeleteArray: JSON.stringify(toDeleteArray)
            }
          });

          AjaxOBJ.done(function (ResponsedMsg) {
            if (ResponsedMsg) {
              Swal.fire({
                icon: 'success',
                title: 'ลบข้อมูลสำเร็จ',
                text: 'ลบข้อมูลทั้งหมด ' + data.length + ' ข้อมูลแล้ว',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                if (!(result.isConfirmed)) {
                  QueryProfileInfo();
                }
              })

            }
          });

          AjaxOBJ.fail(function () {
            alert(ResponsedMsg[0]);
          });
        } else if (result.isDenied) {} else {}
      })


    }

    function doEditProfile(event, IdentifyID, Firstname, Lastname, Role, StudentID) {
      event.stopPropagation();
      Swal.fire({
        title: Firstname + ' ' + Lastname,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `ใช่`,
        denyButtonText: `ไม่`,
        cancelButtonText: "ยกเลิก",
        text: 'ต้องการที่จะแก้ไขข้อมูลนี้หรือไม่',
      }).then((result) => {
        if (result.isConfirmed) {

          answers = {};
          Swal.mixin({
            input: 'text',
            confirmButtonText: 'ต่อไป',
            cancelButtonText: 'ยกเลิก',
            showCancelButton: true,
            progressSteps: ['1', '2', '3', '4', '5']
          }).queue([{
              title: 'รหัสประจำตัวประชาชน',
              inputValue: IdentifyID,
            },
            {
              title: 'ชื่อ',
              inputValue: Firstname,
            },
            {
              title: 'นามสกุล',
              inputValue: Lastname,
            },
            {
              title: 'ประเภทผู้ใช้',
              input: 'select',
              inputValue: Role,
              inputOptions: {
                'student': 'นักเรียน',
                'personnel': 'บุคลากร'
              }
            }, {
              title: 'รหัสนักเรียน',
              text: 'หากเป็นบุคลากรไม่จำเป็นต้องใส่',
              inputValue: StudentID
            }
          ]).then((result) => {
            if (result.value) {
              answers = (result.value)
              Swal.fire({
                title: 'แก้ไขข้อมูล',

                html: "<table border='1' style='border: 0%;'>" +
                  "<thead><tr>" +
                  "<th class='center'>ข้อมูลแก้ไข</th>" +
                  "</tr></thead>" +
                  "<tbody>" +
                  "<tr>" +
                  "<td  class='right'>เลขประจำตัวประชาชน :&nbsp;</td>" +
                  "<td  align='left'>&nbsp;" + answers[0] + "</td>" +
                  "</tr>" +
                  "<tr>" +
                  "<td class='right'> ชื่อ - สกุล :&nbsp;</td>" +
                  "<td align='left'>&nbsp;" + answers[1] + ' ' + answers[2] +
                  "</td>" +
                  "</tr>" +
                  "<tr>" +
                  "<td class='right'>ประเภทผู้ใช้ :&nbsp;</td>" +
                  "<td align='left'>&nbsp;" + (answers[3] === 'student' ? 'นักเรียน' : 'บุคลากร') +
                  "</td>" +
                  "</tr>" +
                  "<tr>" +
                  "<td class='right'>เลขประจำตัวนักเรียน :&nbsp;</td>" +
                  "<td align='left'>&nbsp;" + answers[4] + "</td>" +
                  "</tr>" +
                  "<tr>" +
                  "<td colspan='2' align='center'>" +
                  "<center>ต้องการแก้ไขข้อมูลเหล่านี้ใช่หรือไม่</center>" +
                  "</td>" +
                  "</tr>" +
                  "</tbody>" +
                  "</table>",



                confirmButtonText: 'ยืนยัน',
                showCancelButton: true,
                cancelButtonText: 'ยกเลิก'
              }).then((result) => {
                if (result.isConfirmed) {

                  if (!answers[0] || !answers[1] || !answers[2] || !answers[3] || (answers[3] ===
                      'student' ? (!
                        answers[4]) : (!answers[0]))) {
                    NotifyError('กรุณากรอกข้อมูลให้ครบถ้วน');
                    return;
                  }
                  AjaxOBJ = $.ajax({
                    type: "POST",
                    url: "../PHPFunction/Administrator/Profile/editProfileinfos.php",
                    error: function (ts) {
                      console.log(ts.responseText);
                    },
                    dataType: "json",
                    data: {
                      toEditIndentifyID: IdentifyID,
                      IdentifyID: answers[0],
                      Firstname: answers[1],
                      Lastname: answers[2],
                      Status: answers[3],
                      StudentID: (answers[3] === 'student' ? answers[4] : answers[0])
                    }
                  });

                  AjaxOBJ.done(function (ResponsedMsg) {
                    console.log(ResponsedMsg);
                    if (ResponsedMsg) {
                      Swal.fire({
                        icon: 'success',
                        title: 'แก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                      }).then((result) => {
                        if (!(result.isConfirmed)) {
                          QueryProfileInfo();
                        }
                      })
                    } else {

                      NotifyError('เกิดข้อผิดพลาดในการแก้ไขข้อมูลกรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง');

                    }
                  });
                  AjaxOBJ.fail(function () {
                    NotifyError('เกิดข้อผิดพลาดในการแก้ไขข้อมูลกรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง');
                  });
                }
              })
            }
          })

        } else if (result.isDenied) {} else {}
      })

    }
  </script>

  <script>
    // Action Register Profiles

    function changeRegisterPermission(event, studentID, action) {
      event.stopPropagation();


      switch (action) {
        case 'pending':
          actionTitle = 'การยืนยัน';
          actionText = 'คุณต้องการที่จะยืนยันการใช้งานให้กับหมายเลข ' + studentID + ' ใช่หรือไม่';
          action = 'verified';
          notifyAction = 'pending';
          break;
        case 'verified':
          actionTitle = 'การระงับใช้';
          actionText = 'คุณต้องการที่จะระงับการใช้งานหมายเลข ' + studentID + ' ใช่หรือไม่';
          action = 'suspended';
          notifyAction = 'verified';
          break;
        case 'suspended':
          actionTitle = 'ยกเลิกการระงับใช้';
          actionText = 'คุณต้องการที่จะยกเลิกระงับหมายเลข ' + studentID + ' ใช่หรือไม่';
          action = 'verified';
          notifyAction = 'suspended';
          break;
      }


      Swal.fire({
        title: actionTitle,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `ใช่`,
        denyButtonText: `ไม่`,
        cancelButtonText: "ยกเลิก",
        text: actionText,
      }).then((result) => {
        if (result.isConfirmed) {

          AjaxOBJ = $.ajax({
            type: "POST",
            url: "../PHPFunction/Administrator/Register/registerStatusAction.php",
            error: function (ts) {
              console.log(ts.responseText);
            },
            dataType: "json",
            data: {
              studentID: studentID,
              action: action
            }
          });

          AjaxOBJ.done(function (ResponsedMsg) {
            if (ResponsedMsg) {

              console.log(notifyAction);
              switch (notifyAction) {
                case 'pending':
                  Swal.fire({
                    icon: 'success',
                    title: 'การยืนยัน',
                    text: 'ยืนยันการใช้งานให้กับหมายเลข ' + studentID + ' เรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) => {
                    if (!(result.isConfirmed)) {
                      QueryProfileInfo();
                    }
                  })
                  break;
                case 'verified':
                  Swal.fire({
                    icon: 'success',
                    title: 'การระงับใช้งาน',
                    text: 'ระงับการใช้งานให้กับหมายเลข ' + studentID + ' เรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) => {
                    if (!(result.isConfirmed)) {
                      QueryProfileInfo();
                    }
                  })
                  break;
                case 'suspended':

                  Swal.fire({
                    icon: 'success',
                    title: 'ยกเลิกการระงับ',
                    text: 'ยกเลิกการระงับใช้งานให้กับหมายเลข ' + studentID + ' เรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) => {
                    if (!(result.isConfirmed)) {
                      QueryProfileInfo();
                    }
                  })


                  break;
              }
              QueryRegisterInfos();
            }
          });

          AjaxOBJ.fail(function () {
            alert(ResponsedMsg[0]);
          });
        } else if (result.isDenied) {} else {}
      })

    }

    function QueryRegisterInfos(isRecall = false) {
      $('#Datatable_1').DataTable().rows().remove().draw();
      updateAllData();
      AjaxOBJ = $.ajax({
        type: "POST",
        url: "../PHPFunction/Administrator/queryRegisterinfos.php",
        error: function (ts) {
          console.log(ts.responseText)
        },
        dataType: "json",
        data: {
          AdminID: "WOW" // AdminAuth
        }
      });

      AjaxOBJ.done(function (ResponsedMsg) {
        if (ResponsedMsg) {



          row = new Array();

          ResponsedMsg.forEach(element => {

            VerifiedParm = parameterAppend(['event', element['IndentifyID'], 'verified']);
            NotVerifiedParm = parameterAppend(['event', element['IndentifyID'], 'pending']);
            SuspendedParm = parameterAppend(['event', element['IndentifyID'], 'suspended']);

            Verified = '<center><span onclick="changeRegisterPermission ' + VerifiedParm +
              ';" class="chip green lighten-5">' +
              '<span class="green-text">ได้รับการยืนยืนแล้ว</span>' +
              '</span></center>';
            NotVerified = '<center><span onclick="changeRegisterPermission ' + NotVerifiedParm +
              ';" class="chip blue lighten-5">' +
              '<span class="blue-text">ไม่ได้รับการยืนยัน</span>' +
              '</span></center>';
            Suspended = '<center><span onclick="changeRegisterPermission ' + SuspendedParm +
              ';" class="chip red lighten-5">' +
              '<span class="red-text">ระงับการใช้งาน</span>' +
              '</span></center>';

            switch (element['Permission']) {
              case 'pending':
                Status = NotVerified;
                break;
              case 'verified':
                Status = Verified;
                break;
              case 'suspended':
                Status = Suspended;
                break;
            }


            ParameterLookUpInfo = parameterAppend(['event', element['IndentifyID'], element['StudentID'],
              element[
                'Firstname'], element['Lastname'], element['BirthDate'], element['Email'],
              element['Gender'], parseInt(element['AcademicYear']), element['Status'], element[
                'Permission'], element['Degree'], element['Room'],
            ]);

            LookUpInfo =
              '<center><a href="#" onclick="ViewRegisterInfo' + ParameterLookUpInfo +
              '"><i class="material-icons large-icon cyan-text">person_search</i></a></center>';
            Edit = '<center><a href="#" onclick="doEditRegister' + ParameterLookUpInfo +
              ';"><i class="material-icons large-icon yellow-text text-darken-4">edit</i></a></center>';


            row.push([Status, element['IndentifyID'], element['Firstname'], element['Lastname'],
              'มัธยมปีที่ ' + element['Degree'], 'ห้องที่ ' + element['Room'], (element[
                'Status'] == 'student' ? "นักเรียน" : "บุคลากร"), LookUpInfo, Edit
            ]);
          });

          AddIntoTatable("Datatable_1", row);
          if (isRecall) {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: false,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })

            Toast.fire({
              icon: 'success',
              title: 'อัปเดตข้อมูลเรียบร้อยแล้ว'
            })
          }
        } else {}
      });
      AjaxOBJ.fail(function () {
        alert('failed');
      });

    };


    function AddIntoTatable(TableID, Obj) {
      var t = $('#' + TableID).DataTable();
      Obj.forEach(element => {
        t.row.add(element).draw(false);
      });
    }
  </script>

  <script>
    CurrentContentDIV = null;

    function changeContent(Show) {
      if (!(CurrentContentDIV == Show)) {
        contentDivID = ['dashboard', 'ProfilesInfoTable', 'RegisterTableInfos', 'DataManagement'];

        contentDivID.forEach(element => {
          divObj = document.getElementById(element);
          if (divObj) {
            if (element == Show) {
              divObj.style.display = 'block';

              divObj.classList.add("animate__animated");
              divObj.classList.add("animate__fadeIn");

              console.log('To : ' + Show);
              CurrentContentDIV = Show;
            } else {
              divObj.style.display = 'none';
            }
          }
        });

      }
    }

    function UpdateDashboard(DataSet) {
      document.getElementById('AccessibleProfilesDashboard').innerText = DataSet['accessibleProfiles'];
      document.getElementById('RegisteredDashboard').innerText = DataSet['registered'];
      document.getElementById('SuspendedDashboard').innerText = DataSet['suspended'];
      document.getElementById('pendingDashboard').innerText = DataSet['pending'];
    }

    function QueryAdministratoInfo() {
      AjaxOBJ = $.ajax({
        type: "POST",
        url: "../PHPFunction/Administrator/queryAdminInfos.php",
        error: function (ts) {
          alert(ts.responseText);
        }, // or console.log(ts.responseText)
        dataType: "json",
        data: {
          AdminID: "WOW"
        }
      });

      AjaxOBJ.done(function (ResponsedMsg) {
        if (ResponsedMsg) {
          UpdateDashboard(ResponsedMsg);
          //alert(ResponsedMsg);
        } else {
          alert("False!");
        }
      });
      AjaxOBJ.fail(function () {
        alert("Failed");
      });

    };
  </script>

  <script>
    function updateAllData() {
      updateDeleteButton('SelectedRegister', $('#Datatable_1').DataTable().rows('.selected').data());
      updateDeleteButton('SelectedProfile', $('#Datatable_0').DataTable().rows('.selected').data());


    }

    function updateDeleteButton(ElementID, data) {

      if (!(data.length <= 0)) {
        innerHTML = '<i class="material-icons left white-text">delete</i> ' + 'ลบ ' + data.length +
          ' ข้อมูล';
        document.getElementById(ElementID).innerHTML = innerHTML;
      } else {
        innerHTML = '<i class="material-icons left white-text">delete</i> เลือกข้อมูลที่ต้องการเพื่อลบ';
        document.getElementById(ElementID).innerHTML = innerHTML;
      }
    }

    $(document).ready(function () {



      contentDivID = ['dashboard', 'ProfilesInfoTable', 'RegisterTableInfos', 'DataManagement'];

      changeContent(contentDivID[0]);

      QueryAdministratoInfo();
      QueryProfileInfo();
      QueryRegisterInfos();

      $('#Datatable_1 tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');


        var table = $('#Datatable_1').DataTable();
        var data = table.rows('.selected').data();
        updateDeleteButton('SelectedRegister', data);
      });

      $('#Datatable_0 tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');


        var table = $('#Datatable_0').DataTable();
        var data = table.rows('.selected').data();

        updateDeleteButton('SelectedProfile', data);


      });
    });

    function Logout() {







      Swal.fire({
        title: 'ต้องการที่จะออกจากระบบใช่หรือไม่',
        showConfirmButton: true,
        showCancelButton: true,
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ตกลง'
      }).then((result) => {
        if (result.isConfirmed) {

          AjaxOBJ = $.ajax({
        type: "POST",
        url: "../PHPFunction/Administrator/logout.php",
        error: function (ts) {
          console.log(ts.responseText);
        },
        dataType: "json"

      });

      AjaxOBJ.done(function (ResponsedMsg) {
        console.log(ResponsedMsg);
        if (ResponsedMsg) {
          Swal.fire({
            icon: 'success',
            title: 'ออกจากระบบสำเร็จ',
            showConfirmButton: false,
            timer: 5000
          }).then((result) => {
            window.location="./";
          })
        } else {
          header( "location: ./" );
        }
      });
      AjaxOBJ.fail(function () {
        NotifyError('เกิดข้อผิดพลาดในการเข้าสู่ระบบ');
      });
        }
      })

    }
  </script>

</body>

</html>
