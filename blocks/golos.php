<meta charset="utf-8">	
<style>
#form2{
	display:none;
}
</style>
<script type="text/javascript" language="javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>		
		<div id="golos">
		<div name="form2" id="form2">Вы уже проголосовали.</div>
				<h2>Как вам наш сайт</h2>
				<form action="golos.php"  method="post">
					<input type="radio" name="1" value="1" />Отлично<Br>
					<input type="radio" name="2" value="2" />Хорошо<Br>
					<input type="radio" name="3" value="3" />Нормально<Br>
					<input type="radio" name="4" value="4" />Плохо<Br>
					
					
					<input name="submit" type="submit" value="Голосовать" onClick="saveform (this.form);return false;">
					<div id="enter_name"></div>
				</form>
			
			
			</div>
			<script type="text/javascript">
function saveform (data)
{
    var name = data.name.value;
    $.post('in.php',{name:name},function(data){
        $('#enter_name').html(data);
    },'json');
	
	document.getElementById('form1').style.display="none";
    document.getElementById('form2').style.display="block";
	window.alert('Спасибо, ваш голос учтен.');
}
</script>

<?php
$fn = $_POST['name']; //Получаем именно ту радиокнопку, которая выбрана
$mass = array(); //Инициализируем массив для строк файла
$fp = fopen("vote.txt", "r"); // Открываем файл нашу "базу данных" в режиме чтения
$i=0;

//заполняем циклом массив из файла
while (!feof($fp)) 
{
$mass[$i]=fgets($fp);
$i++;
}
fclose($fp); //закрываем файл

//в зависимости от выбранного ответа, увеличиваем первое или второе значение массива на единицу
if ($fn=="one") {
	$mass[0] = $mass[0] + 1;
	$text = $mass[0]."\r\n".$mass[1];
}
else {
	$mass[1] = $mass[1] + 1;
	$text = $mass[0].$mass[1];
	}

$fp = fopen("vote.txt", "a"); //снова открываем файл-базу, теперь для записи
truncate($fp, 0);  //очищаем его
fwrite($fp, $text); //пишем новые значения
fclose($fp);  //закрываем

die (json_encode ($name));
?>