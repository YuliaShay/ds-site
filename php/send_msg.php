<?php
if ((isset($_POST['g-recaptcha-response'])) && ($_POST['g-recaptcha-response'])){
	$secret='6Lc_niUUAAAAALViv0it1ENumazNwym9YwRwQYgl';
	$ip=$_SERVER['remote_addr'];
	$response=$_POST['g-recaptcha-response'];
	$rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
	//var_dump($rsp);
	$arr=json_decode($rsp, TRUE);
	if ($arr['success']){	
//отправка данных в бд
include('connect.php');//подключение к бд
$question = $_POST['message'];
$username=$_POST['name'];
$date = date("y-m-d H:i:s");
$email=$_POST['email'];
$quer = mysql_query("INSERT INTO `questions` (`username`, `question`, `date`,`e-mail`) VALUES ('$username', '$question', '$date','$email')");
echo '<script type="text/javascript">'; 
echo 'window.location.href="/feedback.php?page=1";'; 
echo '</script>';
}
}
else {
	echo '<script type="text/javascript">'; 
	echo 'window.location.href="/feedback.php?page=1";'; 
echo '</script>';}


				
?>	