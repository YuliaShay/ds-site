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
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css" />	
	<link rel="stylesheet" type="text/css" href="css/aside.css" />
	<link rel="stylesheet" type="text/css" href="css/news.css" />
	<link rel="stylesheet" type="text/css" href="css/sotrud.css" />
	<link rel="stylesheet" type="text/css" href="css/menu_footer.css" />
<style>
div.adv{
	border: solid 1px #f0f0f0;
	padding: 5px;
	border-radius: 10px;
	font: 15px sans-serif;
	color: #828080;
}
div.adv h4{
	color: #496FB5;
}
</style>
</head>
<body>
<?php include('blocks/header_menu.html');?>
		<div class="blog">
			
			<div id="wrapper_main">
				<div class="main"><!-- -->
					<div class="article"><!--основной контент-->
						<div id='nav'><a href='index.php'>Главная</a> / <a href=''>Все объявления</a></div>
						
						
						
						<?php 

						echo "<h3 class='font_title'>Все объявления</h3>";
						$res=mysql_query("select * from advert "); 
						while($myrow=mysql_fetch_array($res)) {	
							$predvar_text=strip_tags($myrow['text']);
							$predvar_text=mb_substr($predvar_text,0,100,'utf-8');
							$predvar_text=rtrim($predvar_text,"!,.-");
							echo "<div class='new_bl'><h4>".$myrow['title']."</h4>
								   <p>".$predvar_text."...</p>
									<a href='show_adv.php?id=".$myrow['id']."' class='submit'><img class='arrow' src='images/others/next.png'></a><div style='clear: both'></div>
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