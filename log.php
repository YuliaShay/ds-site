<meta charset="utf-8"><?php
include('php/connect.php'); 
//вход
if (isset($_POST['a_sub'])){
	$username=$_POST['a_login'];
	$password=$_POST['a_psw'];
	$query="SELECT  * FROM user WHERE user='$username' AND password='$password';";
	$result=mysql_query($query)or die(mysql_error());
	$num_rows=mysql_num_rows($result);
	if ($num_rows==1) {
		echo '<script type="text/javascript">window.location.href="admin/index.php" </script>';
	}else {
		echo '<script type="text/javascript">window.location.href="index.php?l=false" </script>';
		//echo"Не верная пара логин/пароль";
	}
}?>