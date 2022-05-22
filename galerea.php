<?php include('php/connect.php');
	function get_images($dir){
		@$files = scandir($dir);
		$pattern="#\.(jpeg|png|jpg)$#";
		foreach($files as $key=>$file){
			if(!preg_match($pattern, $file)){
				unset($files[$key]);
			}		
		}
		return $files;
	}
$dir = 'images/galerea/';
$images = get_images($dir);
?>
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
	<link rel="stylesheet" type="text/css" href="css/galerea11.css" />
	<link rel="stylesheet" type="text/css" href="css/menu_footer.css" />
	

 <link type="text/css" href="1/css/styles.css" rel="stylesheet" media="all" />
		 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	 <script src="1/js/jquery.quicksand.js" type="text/javascript"></script>
     <script src="1/js/jquery.easing.js" type="text/javascript"></script>
     <script src="1/js/script.js" type="text/javascript"></script>
     <script src="1/js/jquery.prettyPhoto.js" type="text/javascript"></script> 
     <link href="1/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
	<!--<div id="page"><a href="echo($dir.$image); 
						?>">-->
		<?php include('blocks/header_menu.html');?>
		<div class="blog">
		
			<div id="wrapper_main">
				<div class="main"><!-- -->
					<div class="article">
							<?php //echo "<div id='nav'><a href='index.php'>Главная</a> / <a href=''>Галерея</a></div>";
							?>
							<div class="main-gal">
								<?php //include('blocks/galerea.html'); ?>
								<div id="gallery">
									
									<div class="wrapper">
										<div class="portfolio-content">	
											<ul class="portfolio-area">
											<?php
												foreach($images as $image):?>
												<li class="portfolio-item2" data-id="id-9" data-type="cat-item-2">	
													<div>
													<span class="image-block">
														<a class="image-zoom" href="<?echo($dir.$image); ?>" rel="prettyPhoto[gallery]" title="">
															<img width="225" height="140" src="<?echo($dir.$image); ?>" title="" />                    
														</a>
													</span>
													</div>	
												</li>
												<? endforeach; ?>

											<div class="column-clear"></div>
											</ul>
										</div>
									</div>
						
								</div>	
							</div>
						<div style="clear: both;"></div>
					</div>	
				</div>	
			</div>
			<?php include('blocks/aside.html'); ?>
		</div>
		<?php include('blocks/footer.html'); ?>
	<!--</div> page-->

</body>
</html>