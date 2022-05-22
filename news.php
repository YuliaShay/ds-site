<?php include('php/connect.php');

$result = mysql_query("SELECT title, text FROM settings WHERE page='history'",$db);
$myrow=mysql_fetch_array($result); ?>
<?php if (isset($_GET['p'])) {$page=$_GET['p'];}
$result = mysql_query("SELECT * FROM settings WHERE page='$page'",$db);
$myrow=mysql_fetch_array($result); ?>
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
<body>
<?php include('blocks/header_menu.html');?>
		<div class="blog">
			
			<div id="wrapper_main">
				<div class="main"><!-- -->
					<div class="article">
						<div id='nav'><a href='index.php'>Главная</a> / <a href=''>Наши новости</a></div>
						<?php 
						echo "<h3 class='font_title'>Наши новости</h3>";
						$res=mysql_query("select * from news "); 
						while($myrow=mysql_fetch_array($res)) {	
							$predvar_text=strip_tags($myrow['text']);
							$predvar_text=mb_substr($predvar_text,0,100,'utf-8');
							$predvar_text=rtrim($predvar_text,"!,.-");
							//$predvar_text=substr($predvar_text,0,strrpos($predvar_text,' '));
							echo "<div class='new_bl'><h4>".$myrow['title']."</h4>
								   <p><img class='prev_img' src='".$myrow['img']."'/>".$predvar_text."...</p>
									<a href='show_new.php?id=".$myrow['id']."' class='submit'><img class='arrow' src='images/others/next.png'></a><div style='clear: both'></div>
								</div>";
							}
						?>
					</div>
				</div>
			</div>
			<?php include('blocks/aside.html'); ?>
		</div>
<?php include('blocks/footer.html'); ?>

</body>
</html>