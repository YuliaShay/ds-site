<?php include('php/connect.php');
$result = mysql_query("SELECT * FROM staff ",$db);
$myrow=mysql_fetch_array($result);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
	<link rel="stylesheet" type="text/css" href="css/aside.css" />
	<link rel="stylesheet" type="text/css" href="css/news.css" />
	<link rel="stylesheet" type="text/css" href="css/sotrud.css" />
	<link rel="stylesheet" type="text/css" href="css/menu_footer.css" />
	<link rel="stylesheet" media="screen and (min-width: 1024px) and (max-width: 1338px)" href="css/style1024_1338.css"/>
	
</head>
<body>
	<?php include('blocks/header_menu.html');?>
		<div class="blog">
			
			<div id="wrapper_main">
				<div class="main"><!-- -->
					<div class="article">
						<h3 class="font_title">Наши сотрудники</h3>
						<?php
							echo "<div id='staff'>";
							while($myrow=mysql_fetch_array($result)) {
								echo "<div class='sotr'>";
								echo"<img class='img_sotr' src='".$myrow['image']."'/>";
								echo"<h5>".$myrow['position']."</h5>";
								echo"<p>".$myrow['fio']."</p>";
								echo"<p>Образование: ".$myrow['edu']."</p>";
								echo"<p>Стаж: ".$myrow['stazh']."</p>";
								echo"<p>".$myrow['contacts']."</p>";
								
								echo"</div>";
							}
							
							echo"</div>";
						
						?>
						
						
						<!--<div id="staff">

							<div class="sotr">
								<img class="img_sotr" src="images/sotrud/1.jpg"/>
								<h5>Руководитель</h5><p>Волгина Татьяна Васильевна</p>
							</div>
				
							<div class="sotr">
								<img class="img_sotr" src="images/sotrud/2.jpg"/>
								<h5>Заместитель руководителя</h5><p>Хакимова Альфия Габдулхаевна</p>
							</div>				
							<div class="sotr">
								<img class="img_sotr" src="images/sotrud/3.jpg"/>
								<h5>Муз. руководитель</h5>
								<p>Мордвинова Лариса Борисовна</p>
							</div>
							<div class="sotr">
								<img class="img_sotr" src="images/sotrud/4.jpg"/>
								<h5>Воспитатель</h5><p>Иванова Елена Сергеевна</p>
							</div>
							<div class="sotr">
								<img class="img_sotr" src="images/sotrud/5.jpg"/>
								<h5>Воспитатель</h5><p>Ларина Мария Анатольевна</p>
							</div>				
							<div class="sotr">
								<img class="img_sotr" src="images/sotrud/6.jpg"/>
								<h5>Воспитатель</h5><p>Евсеева Алена Дмитриевна</p>
							</div>
							<div class="sotr">
								<img class="img_sotr" src="images/sotrud/7.jpg"/>
								<h5>Воспитатель</h5><p>Петрова Наталья Дмитриевна</p>
							</div>				
				
						</div>	-->
					</div>
				</div>
			</div>
			<?php include('blocks/aside.html'); ?>

		</div>
	<?php include('blocks/footer.html'); ?>

</body>
</html>