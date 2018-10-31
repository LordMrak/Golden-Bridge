<?

//require_once 'app/init.php';


if(isset($_POST['num'])) 
	$n=$_POST['num'];
else
	$n=5;

make_mass($n);



function make_mass($rang)
{
	//echo($n);
	$value = 1;
	//$mass = [];
	
	
	
	$bool_num_type = false;// Если четное то false
	//$f_step = ceil($n/2);
	if($rang/2-floor($rang/2)>0) $bool_num_type = true;
		
	$n=$rang-1;
	$y=$n;
	$focus_y = 0;
	$focus_n = 0;
	
	
	$layer = floor($rang/2);
	
	for($i=0;$i<$layer;$i++)	// Проходим х/2 слоев заливки матрицы. если не четное, то округляем в меньшую сторону
	{	
		for($j=$focus_n;$j<=$n-$i;$j++)
		{
			$mass[$focus_y][$j] = $value;
				
			$value++;
		}
			$focus_y=$i+1;  //Ставим $y на шаг вперед, т.к. текйщий слой заполнен
			$focus_n=$n-$i; //n ставим в крайнее положение текущего слоя
		
		
		for($j=$focus_y;$j<=$y-$i;$j++)
		{
			$mass[$j][$focus_n] = $value;
			$value++;
		}
					
			$focus_y=$y-$i;  // y устанавливаем в крайнеее положение на слое 
			$focus_n=$n-$i-1; //n ставим в положение на 1 влево т.к. текущий слой заполнен на предыдущем шаге
			
		for($j=$focus_n;$j>=$i;$j--)
		{
			$mass[$focus_y][$j] = $value;
			$value++;
		}
					
			$focus_y=$y-$i-1;
			$focus_n=$i;
			
		for($j=$focus_y;$j>=$i+1;$j--)
		{
			$mass[$j][$focus_n] = $value;
			$value++;
		}
			
			$focus_y=$i+1;
			$focus_n=$i+1;
	}
	
	if($bool_num_type)$mass[floor($rang/2)][floor($rang/2)] = $value;
	
	
	echo_array2($mass);
};
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<?php 

function echo_array(array $e_mass)
{
	
	?> <table border="1px" > <?
	foreach($e_mass as $row)
	{
		?> <tr> <?
		foreach($row as $element)
		{
			?> <td><? echo $element; ?></td> <?
		}
		?> </tr> <?
	}
	?></table><?
}
function echo_array2(&$e_mass)
{
	$rang = count($e_mass);
	?> <table border="1px" > <?
	for($i=0;$i<$rang;$i++)
	{
		?> <tr> <?
		for($j=0;$j<$rang;$j++)
		{
			?> <td><? echo $e_mass[$i][$j]; ?></td> <?
		}
		?> </tr> <?
	}
	?></table><?
}
?>

	<form action="index.php" method="post">
		<input type="number" value="5" name="num">
		<input type="submit" value="Отправить">
	</form>
</html>