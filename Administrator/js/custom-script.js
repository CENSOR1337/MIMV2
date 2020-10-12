/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

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

	  } else {
		alert("False!");
	  }
	});

	AjaxOBJ.fail(function () {
	  alert("Failed");
	});

  };