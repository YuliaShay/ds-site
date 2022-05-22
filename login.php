<?php
include('php/connect.php');
session_start();
if (isset($_POST['a_sub'])){
	$username=$_POST['a_login'];
	$password=$_POST['a_psw'];
	$query="SELECT * FROM user WHERE user='$username' AND password='$password';";
	$result=mysql_query($query)or die(mysql_error());
	$num_rows=mysql_num_rows($result);
	if ($num_rows==1) {
		$found_user=mysql_fetch_array($result);
		$_SESSION['user_id']=$found_user['id'];
		$_SESSION['username']=$found_user['user'];
		echo"<script>document.location.href ='/admin/index.php' </script>";
		//echo "ok";
	}else {
		//echo"<script>document.location.href ='index.php' </script>";

	}
}
?>