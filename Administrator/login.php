<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["username"] = "green";
$_SESSION["favanimal"] = "cat";
echo $_SESSION["username"];
?>

</body>
</html>