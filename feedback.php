<?php
include('php/connect.php');//подключение к бд?>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width; initial-scale=1.0">	
	<link rel="stylesheet" href="css/styles.css"><!--стили для меню -->
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
	<link rel="stylesheet" type="text/css" href="css/aside.css" />
	<link rel="stylesheet" type="text/css" href="css/news.css" />
	<link rel="stylesheet" type="text/css" href="css/sotrud.css" />
	<link rel="stylesheet" type="text/css" href="css/menu_footer.css" />
	<link rel="stylesheet" media="screen and (max-width: 524px)" href="css/style524.css"/>
	<link rel="stylesheet" media="screen and (min-width: 525px) and (max-width: 768px)" href="css/style525_768.css"/>
	<link rel="stylesheet" media="screen and (min-width: 769px) and (max-width: 960px)" href="css/style769_960.css"/>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<!--<div id="page">-->
	<?php include('blocks/header_menu.html');?>
		<div class="blog">
			<div id="wrapper_main"> 
				<div class="main">
					<div class="article">
					<h3 class="font_title">Обратная связь</h3>
					<p class='font_title'>Уважаемые родители!</p> 
					<p>Здесь вы можете связаться с администрацией детского сада или оставить свои отзывы, предложения или вопросы. Будем рады сотрудничеству с Вами.</p>
						<?php include('blocks/form.html');	?>
						<p>По всем возникающим вопросам Вы также можете обратиться в приемные дни:</p>
						<ul><li>Понедельник: 14:00 - 17:30</li>
						<li>Четверг: 9:00 - 12:00</li>
						</ul>
						<?php
						if (isset($_GET['page'])){
							$page = $_GET['page'];
						}else {$page=1;}
						if ($page==1) {
							$query = mysql_query("SELECT * FROM `questions` ORDER BY `date` DESC LIMIT 10");
						}
						if ($page>1) {
							$limit = $page*10-10;
							$query = mysql_query("SELECT * FROM `questions` ORDER BY `date` DESC LIMIT $limit,10");
						}
						while($r=mysql_fetch_array($query)) {
							echo"<table class='table_quest'>";
							echo "<tr><td class='uname'>От: ".$r['username']."</td><td class='dat'>".$r['date']."</td></tr>";
							echo "<tr><td colspan='2'>".$r['question']."</td></tr>";
							if ($r['answer']!=''){
								echo "<tr><td class='uname'>Ответ: ".$r['answer']."</td></tr>";}
							echo"</table>";
						}
						//нумерация стр
						echo "<div id='paginat'>";
						$query2 = mysql_query("SELECT * FROM `questions`");
						$rowss = mysql_num_rows($query2);
						$rows = ceil($rowss/10);
						if ($rows>1) {
						for ($i=1;$i<=$rows;$i++) {
							if ($page==$i){
								echo "<a href=?page=".$i." class='pages_act' >".$i."</a> ";
							}else { echo"<a href=?page=".$i." class='pages'>".$i."</a> ";}
							//echo '<a href="?page='.$i.'">'.$i.'</a>  ';
						}
						}
						echo "</div>";?>
						
					</div><!--end article -->
				</div><!--end main -->
			</div>
			<?php include('blocks/aside.html'); ?>
			<div style="clear: both;"></div>
			
			
		</div>
		<?php include('blocks/footer.html'); ?>
</body>
</html>