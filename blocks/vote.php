<meta charset="utf-8">	
<?php 
include('php/connect.php'); 
//сначала узнаем номер опроса:
$q=mysql_query("select id from vote where public=1");
$iden=mysql_fetch_array($q);
$id=$iden['id'];//
//поиск ip
	$ip=$_SERVER["REMOTE_ADDR"];
	$q=mysql_query("select count(*) from `vote_ip` where ip='$ip' and id_question=$id");
	$myrow=mysql_fetch_array($q);	
	$count=$myrow[0];
	if ($count==0)//если ip нет в бд
	{
		//если нажата кнопка
		if (isset($_POST['res'])) {
			if (isset($_POST['r'])) { $r=$_POST['r']; //echo $r; 
			}
			//вставка ip
			//$ip=$_SERVER["REMOTE_ADDR"]; 
			$q=mysql_query("insert into `vote_ip` (id_question,num_var,ip) values ($id, $r,'$ip' )"); 
			//вставка выбранного варианта
			$var="var".$r;
			//проверка есть ли строка в табл
			$check=mysql_query("select count(*) from `vote_result` where id_q=$id"); 
			$check_arr=mysql_fetch_array($check); 
			$col=$check_arr[0];
			if ($col==0) {$query1=mysql_query("insert into vote_result (id_q) values ($id) ");}
			
			if ($r==1){
				$q1=mysql_query("update `vote_result` set var1=var1+1 where id_q=$id"); 
			}
			if ($r==2){
				$q1=mysql_query("update `vote_result` set var2=var2+1 where id_q=$id"); 
			}
			if ($r==3){
				$q1=mysql_query("update `vote_result` set var3=var4+1 where id_q=$id"); 
			}
			if ($r==4){
				$q1=mysql_query("update `vote_result` set var4=var4+1 where id_q=$id"); 
			}
			if ($r==5){
				$q1=mysql_query("update `vote_result` set var5=var5+1 where id_q=$id"); 
			}
			//вывод результата голосования
			$q=mysql_query("select * from vote_result where id_q=$id");
			
			$results=mysql_fetch_array($q);
			$sum=$results['var1']+$results['var2']+$results['var3']+$results['var4']+$results['var5'];//сумма всех голосов за все варианты
			
			$query=mysql_query("select * from vote where id=$id");
			$row0=mysql_fetch_array($query);	
			
			$percent1=round($results['var1']/$sum*100,2);
			$percent2=round($results['var2']/$sum*100,2);
			$percent3=round($results['var3']/$sum*100,2);
			$percent4=round($results['var4']/$sum*100,2);
			$percent5=round($results['var5']/$sum*100,2);
			echo "<div id='VoteResult'> Результат:  <br>";
			echo $row0['question']."<br>";
			echo $row0['var1']." - ".$percent1."%<br>";
			echo $row0['var2']." - ".$percent2."%<br>";
			echo $row0['var3']." - ".$percent3."%<br>";
			echo $row0['var4']." - ".$percent4."%<br>";
			echo $row0['var5']." - ".$percent5."%<br>";
			echo "Всего голосов: ".$sum."</div>";
			
		}else{//если кнопка не нажата
		//if (isset($_GET['id'])) {$id=$_GET['id'];  } else {$id=1;}
		//
		$query=mysql_query("select * from vote where public=1");
		$row=mysql_fetch_array($query);						
			echo"<div id='golos'><h2>". $row['question']."</h2>
				<form  action='index.php' method='post' id='VoteForm'>
			<input type='radio' name='r' value='1' checked />". $row['var1']."<Br>
				<input type='radio' name='r' value='2' />". $row['var2']."<Br>
				<input type='radio' name='r' value='3'/>". $row['var3']."<Br>
				<input type='radio' name='r' value='4'/>". $row['var4']."<Br>
				<input type='radio' name='r' value='5' />". $row['var5']."<Br>
				<input type='submit' name='res' value='Результат' id='res'>	
				</form></div>";	
			}
	}
	else{//если польз уже голосовал
		//вывод результата голосования
			$q=mysql_query("select * from vote_result where id_q=$id");
			$results=mysql_fetch_array($q);
			$sum=$results['var1']+$results['var2']+$results['var3']+$results['var4']+$results['var5'];//сумма всех голосов за все варианты
			$percent1=round($results['var1']/$sum*100, 2);
			$percent2=round($results['var2']/$sum*100, 2);
			$percent3=round($results['var3']/$sum*100, 2);
			$percent4=round($results['var4']/$sum*100, 2);
			$percent5=round($results['var5']/$sum*100, 2);
			$query=mysql_query("select * from vote where id=$id");
			$row0=mysql_fetch_array($query);
			echo "<div id='VoteResult'><h4>Результат:</h4> ";
			echo $row0['question']."<br>";
			echo $row0['var1']." - ".$percent1."%<br>";
			echo $row0['var2']." - ".$percent2."%<br>";
			echo $row0['var3']." - ".$percent3."%<br>";
			echo $row0['var4']." - ".$percent4."%<br>";
			echo $row0['var5']." - ".$percent5."%<br>";
			echo "Всего голосов: ".$sum."<p>Благодарим за участие в нашем опросе</p></div>";
	}?>