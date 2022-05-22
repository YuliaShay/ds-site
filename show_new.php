<?php include('php/connect.php'); ?>
<?php 
if (isset($_GET['id'])) {$id=$_GET['id'];}
$result = mysql_query("SELECT * FROM news WHERE id='$id'",$db);
$myrow=mysql_fetch_array($result); 
?>
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
	<link rel="stylesheet" media="screen and (min-width: 1024px) and (max-width: 1338px)" href="css/style1024_1338.css"/>

</head>
<body><?php include('blocks/header_menu.html');?>
		<div class="blog">
			
			<div id="wrapper_main">
				<div class="main">
					<div class="article">
				
					<?php
						echo"<div id='nav'><a href='index.php'>Главная</a> / <a href='news.php'>Новости</a> / <a href=''>" .$myrow['title']."</a></div>";
						echo "<h3 class='font_title'>".$myrow['title']."</h3><p class='font_content'>".$myrow['text']."</p>";
					?>

					</div>
				</div>
			</div>
			<?php include('blocks/aside.html'); ?>
			<div style="clear: both;"></div>		
		</div>
		<?php include('blocks/footer.html'); ?>
</body>
</html>