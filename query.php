<!DOCTYPE HTML>
<html>
<body>
<?php
session_start();
include("DBConnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
$email=$_SESSION['s_email'];
$name=$_SESSION['s_name'];
$phone=$_SESSION['s_phone'];
$query =' $$ '.mysqli_real_escape_string($db, $_POST["query"]);
$stmt = $db->prepare("UPDATE usr_info SET query=CONCAT(query,?),date_time=NOW() WHERE usr_email= ? AND usr_name= ? AND usr_phone= ?");
$stmt->bind_param("ssss", $query,$email,$name,$phone);
$stmt->execute();
$result = $stmt->affected_rows;
$stmt -> close();
$db -> close(); 

}
?>
</body>
</html>
