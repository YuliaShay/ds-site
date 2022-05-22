<?php include('php/connect.php');

$result = mysql_query("SELECT title, text FROM settings WHERE page='contacts'",$db);
$myrow=mysql_fetch_array($result); ?>

<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width; initial-scale=1.0">	
	
	<link rel="stylesheet" href="css/styles.css"><!--стили для меню -->
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
	<!--<link href="css/mediaqueries.css" rel="stylesheet" >-->
	<link rel="stylesheet" type="text/css" href="css/aside.css" />
	<link rel="stylesheet" type="text/css" href="css/news.css" />
	<link rel="stylesheet" type="text/css" href="css/sotrud.css" />
	<link rel="stylesheet" type="text/css" href="css/menu_footer.css" />
	<link rel="stylesheet" media="screen and (max-width: 524px)" href="css/style524.css"/>
	<link rel="stylesheet" media="screen and (min-width: 525px) and (max-width: 768px)" href="css/style525_768.css"/>
	<link rel="stylesheet" media="screen and (min-width: 769px) and (max-width: 960px)" href="css/style769_960.css"/>
	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
		 function initialize() {
		 var latlng = new google.maps.LatLng(55.241623, 61.368535);
		 var settings = {
		 zoom: 15,
		 center: latlng,
		 mapTypeControl: true,
		 mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		 navigationControl: true,
		 navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
		 mapTypeId: google.maps.MapTypeId.ROADMAP
		 };
		 var map = new google.maps.Map(document.getElementById("map_canvas"), 
		settings);
		var companyPos = new google.maps.LatLng(55.241623, 61.368535);
		var companyMarker = new google.maps.Marker({
		position: companyPos,
		map: map,
		animation: google.maps.Animation.BOUNCE,
		title:"Детский сад №255"
		});
		}
</script>
</head>
<body onload="initialize()">
<?php include('blocks/header_menu.html');?>
		<div class="blog">
			
			<div id="wrapper_main">
				<div class="main"><!-- -->
					<div class="article">
				
						<!--<div id='nav'><a href='index.php'>Главная</a>/<a href=''>Контактная информация</a></div>-->
						<?php  echo "<h3 class='font_title'>".$myrow['title']."</h3><p class='font_content'>".$myrow['text']."</p>";  ?>
						<div id="map_canvas" style="width: 80%; height:40%; margin: 0 auto; border: solid 3px #19BAFF;"></div>
					</div>
				</div>
			</div>
			<?php include('blocks/aside.html'); ?>
			<div style="clear: both;"></div>
			
		</div>
		<?php include('blocks/footer.html'); ?>
</body>
</html>