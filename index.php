<?php 
include('php/connect.php');
//для админа
if ((isset($_GET['l']))&&($_GET['l']=='false')) {echo "<div id='msg_adm'>Не удалось войти, неправильный логин или пароль<a href='index.php'>Закрыть</a></div>";}
?>
<?php  //выбор статьи в зависимости от переданного параметра
if (isset($_GET['p'])) {$page=$_GET['p'];}
$result = mysql_query("SELECT * FROM settings WHERE page='$page'",$db);
$myrow=mysql_fetch_array($result);
?>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width; initial-scale=1.0">	
	<link rel="stylesheet" href="css/styles.css"><!--основные стили сайта -->
	<link rel="stylesheet" type="text/css" href="css/menu.css" /><!--стили для меню -->
	<link rel="stylesheet" type="text/css" href="css/aside.css" /><!--стили для боковой части сайта -->
	<link rel="stylesheet" type="text/css" href="css/slider_index.css" /><!--стил для слайдера на главной стр -->
	<link rel="stylesheet" type="text/css" href="css/menu_footer.css" />
	<link rel="stylesheet" media="screen and (min-width: 1024px) and (max-width: 1299px)" href="css/style1024_1299.css"/>
	<link rel="stylesheet" media="screen and (min-width: 960px) and (max-width: 1023px)" href="css/style960_1023.css"/>
	<link rel="stylesheet" media="screen and (min-width: 769px) and (max-width: 959px)" href="css/style769_959.css"/>
	<link rel="stylesheet" media="screen and (min-width: 524px) and (max-width: 768px)" href="css/style524_768.css"/>
	<link type="text/css" href="1/css/styles.css" rel="stylesheet" media="all" />
		 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		 <script src="1/js/jquery.quicksand.js" type="text/javascript"></script>
     <script src="1/js/jquery.easing.js" type="text/javascript"></script>
     <script src="1/js/script.js" type="text/javascript"></script>
     <script src="1/js/jquery.prettyPhoto.js" type="text/javascript"></script> 
     <link href="1/css/prettyPhoto.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php include('blocks/header_menu.html');?><!--подключение шапки сайта-->
	<div class="blog"><!--основной блок сайта -->
		
		<div id="wrapper_main">
			<div class="main"><!-- -->
				<div class="article"><!--основной контент-->
			<!--вывод статьи на главной стр если не передан другой параметр-->
				<?php if (!isset($_GET['p'])){
					
					echo "<h3 class='font_title'>Добро пожаловать !</h3><p class='font_content'>";
					
					
					echo "<div class='wrapper_index_page'>";
					echo"<ul id='slides'>
							<li class='slide showing'><img src='images/news/4.jpg'></li>
							<li class='slide'><img src='images/news/1.jpg'></li>
							<li class='slide'><img src='images/news/2.jpg'></li>
							<li class='slide'><img src='images/news/3.jpg'></li>
							<li class='slide'><img src='images/news/4.jpg'></li>
						</ul>					
					<div class='index_page'>
					Приветствуем вас на сайте муниципального бюджетного дошкольного образовательного учреждения 'Детский сад № 255 г.Челябинска'.
					На нашем сайте Вы можете найти информацию  об истории детского сада, о 
					реализуемых программах воспитания и обучения детей дошкольного возраста, познакомиться с документами, 
					регламентирующими деятельность ДОУ.</p>
					<p>Также вы можете узнать о современных тенденциях в дошкольном образовании;  анонсы и отчеты;  
					о мероприятиях, проводимых в дошкольном учреждении. </p></div>";

					echo "</div>";

					//вывод последних новостей и объяв
					echo "<div class='wrapper_new_bl'><h3 class='font_title2'>Последние новости</h3>";
					$res=mysql_query("select * from news ORDER BY id DESC LIMIT 3"); 
					while($myrow=mysql_fetch_array($res)) {	
							$predvar_text=strip_tags($myrow['text']);
							$predvar_text=mb_substr($predvar_text,0,100,'utf-8');
							$predvar_text=rtrim($predvar_text,"!,.-");
						echo "<div class='new_bl'><h4>".$myrow['title']."</h4>
								   <p><img class='prev_img' src='".$myrow['img']."'/>".$predvar_text."...</p>
									<a href='show_new.php?id=".$myrow['id']."' class='submit'><img class='arrow' src='images/others/next.png'></a><div style='clear: both'></div>
								</div>";
							}
					echo "</div>";
					//вывод объяв
					echo "<div class='wrapper_new_bl'><h3 class='font_title2'>Объявления</h3>";
					$res=mysql_query("select * from advert ORDER BY id DESC LIMIT 3"); 
					while($myrow=mysql_fetch_array($res)) {	
							$predvar_text=strip_tags($myrow['text']);
							$predvar_text=mb_substr($predvar_text,0,100,'utf-8');
							$predvar_text=rtrim($predvar_text,"!,.-");
						echo "<div class='obv_bl'><h4>".$myrow['title']."</h4>
								   <p>".$predvar_text."...</p>
									<a href='show_adv.php?id=".$myrow['id']."' class='submit'> <img class='arrow' src='images/others/next.png'></a><div style='clear: both'></div>
								</div>";
							}
					echo "</div>";
					}else{ //иначе вывод статьи в зависомости от переданного параметра
						//echo"<div id='nav'><a href='index.php'>Главная</a> / <a href=''>" .$myrow['title']."</a></div>";	
						echo "<h3 class='font_title'>".$myrow['title']."</h3><p class='font_content'>".$myrow['text']."</p>"; 
					}
					?>	
					
					
					<?php //include('blocks/menu_block.html');?>
				</div>   <!--конец article -->
			</div><!--конец main -->
			
		
		</div><!--конец wrapper_main -->
		<?php include('blocks/aside.html'); ?><div style="clear: both"></div>
	</div><!--конец blog -->
	<?php include('blocks/footer.html'); ?><!--подключение подвала -->
	<script>// слайдер
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);
function nextSlide(){
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}
	</script>
</body>
</html>