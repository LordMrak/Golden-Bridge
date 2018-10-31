<?

//include("connection/con_base.php");
//include("templates/check_all_income.php");

$query='SELECT 
		  `id`,
		  `login`,
		  `pass`,
		  `id_user`,
		  `default`
		FROM 
		  `myfxbook_acc`;';

	$myfxbook_acc=$db_gb->select($query);

foreach($myfxbook_acc as $myfxbook_acc)
{

	$login_name = $myfxbook_acc['login'];
	$login_pw   = $myfxbook_acc['pass'];
	
	$login_string = "$login_name&password=$login_pw";
	$url = "http://www.myfxbook.com/api/login.xml?email=$login_string";
	 
	$login = file_get_contents($url);
	$xml_sess = simplexml_load_string($login);
	$sess = $xml_sess->session;
	
	
		$url="http://www.myfxbook.com/api/get-my-accounts.xml?session=$sess";
		$data = file_get_contents($url);
		
		$xml_data = simplexml_load_string($data);
		
		$zu =0;
		//$m_myfxbook[][];
		foreach ($xml_data->xpath('//account') as $niks) {
			//print_r($niks);
			
			$accountId = $xml_data->accounts->account[$zu]->id;// Номер счета в системе Myfxbook
			$profit = (double) $xml_data->accounts->account[$zu]->profit;// Профит какойто
			$deposits = (double) $xml_data->accounts->account[$zu]->deposits;
  			$withdrawals = (double) $xml_data->accounts->account[$zu]->withdrawals;
			$net_deposits = $deposits-$withdrawals;//введеных средств
			$balance = (double) $xml_data->accounts->account[$zu]->balance; // Баланс
			$per = ($profit/$net_deposits)*100;//Реальный %
			
			$m_myfxbook[$zu][0] = $accountId;
			$m_myfxbook[$zu][1] = round($profit,2);
			$m_myfxbook[$zu][2] = $accountId;
			$m_myfxbook[$zu][3] = $net_deposits;
			$m_myfxbook[$zu][4] = $balance;
			//$m_myfxbook[$zu][5] =  round($per,2);
			$m_myfxbook[$zu][5] = (double) $xml_data->accounts->account[$zu]->monthly; // 
			$m_myfxbook[$zu][6] = $xml_data->accounts->account[$zu]->name;// Название счета в системе Myfxbook

			$zu++;
		}
	$url = "http://www.myfxbook.com/api/logout.xml?session=$sess";
	$logout = file_get_contents($url);
	$xml_logout = simplexml_load_string($logout);
	
	
	
	
	
	$query='SELECT 
	  myfxbook.id,
	  myfxbook.name,
	  myfxbook.num_acc,
	  myfxbook.id_schet_bro,
	  myfxbook.id_acc,
	  myfxbook.agress,
	  myfxbook.prim,
	  accaunt_management.name as `man`,
	  products.referral as `ref_pro`,
	  brokers.referral as `ref_bro`,
	  brokers.ico,
	  brokers.name as `bro_name`,
	  currency.name as `cur`
	FROM
	  myfxbook
	  INNER JOIN schet_bro ON (myfxbook.id_schet_bro = schet_bro.id)
	  INNER JOIN accaunt_management ON (schet_bro.id_management = accaunt_management.id)
	  INNER JOIN products ON (accaunt_management.id_product = products.id)
	  INNER JOIN brokers ON (schet_bro.id_bro = brokers.id)
	  INNER JOIN currency ON (schet_bro.currency = currency.id)
	where
	   `id_acc` = '.$myfxbook_acc["id"].' and
	   myfxbook.show = ?
	  group by myfxbook.id
	  ;';
	
	$myfxbook = $db_gb->select($query,'y');
	$i=0; $y=0; $z=0; $ro=0; $ri=0;
	foreach($myfxbook as $myfxbook)
	{	

		if($myfxbook['agress']==1)
		{
			$mass_acc[1][$i][1] = $myfxbook['num_acc'];
			$mass_acc[1][$i][2] = $myfxbook['prim'];
			$mass_acc[1][$i][3] = $myfxbook['man'];
			
			$mass_acc[1][$i][4] = $myfxbook['ref_pro'];
			$mass_acc[1][$i][5] = $myfxbook['ref_bro'];//Ссылка на брокера с партнерской ссылкой. На иконке брокера
			$mass_acc[1][$i][6] = $myfxbook['ico'];
			$mass_acc[1][$i][7] = $myfxbook['bro_name'];
			$mass_acc[1][$i][8] = $myfxbook['cur'];
			
			$i++;
			}else
		if($myfxbook['agress']==2)
		{
			$mass_acc[2][$y][1] = $myfxbook['num_acc'];
			$mass_acc[2][$y][2] = $myfxbook['prim'];
			$mass_acc[2][$y][3] = $myfxbook['man'];
			
			$mass_acc[2][$y][4] = $myfxbook['ref_pro'];
			$mass_acc[2][$y][5] = $myfxbook['ref_bro'];//Ссылка на брокера с партнерской ссылкой. На иконке брокера
			$mass_acc[2][$y][6] = $myfxbook['ico'];
			$mass_acc[2][$y][7] = $myfxbook['bro_name'];
			$mass_acc[2][$y][8] = $myfxbook['cur'];
			
			$y++;
			}else
		if($myfxbook['agress']==3)
		{
			$mass_acc[3][$z][1] = $myfxbook['num_acc'];
			$mass_acc[3][$z][2] = $myfxbook['prim'];
			$mass_acc[3][$z][3] = $myfxbook['man'];
			
			$mass_acc[3][$z][4] = $myfxbook['ref_pro'];
			$mass_acc[3][$z][5] = $myfxbook['ref_bro'];
			$mass_acc[3][$z][6] = $myfxbook['ico'];
			$mass_acc[3][$z][7] = $myfxbook['bro_name'];
			$mass_acc[3][$z][8] = $myfxbook['cur'];
			$z++;
			}else
		if($myfxbook['agress']==4)
		{
			$mass_acc[4][$ro][1] = $myfxbook['num_acc'];
			$mass_acc[4][$ro][2] = $myfxbook['prim'];
			$mass_acc[4][$ro][3] = $myfxbook['man'];
			
			$mass_acc[4][$ro][4] = $myfxbook['ref_pro'];
			$mass_acc[4][$ro][5] = $myfxbook['ref_bro'];//Ссылка на брокера с партнерской ссылкой. На иконке брокера
			$mass_acc[4][$ro][6] = $myfxbook['ico'];
			$mass_acc[4][$ro][7] = $myfxbook['bro_name'];
			$mass_acc[4][$ro][8] = $myfxbook['cur'];
			$ro++;
			}else
		if($myfxbook['agress']==5)
		{
			$mass_acc[5][$ri][1] = $myfxbook['num_acc'];
			$mass_acc[5][$ri][2] = $myfxbook['prim'];
			$mass_acc[5][$ri][3] = $myfxbook['man'];
			
			$mass_acc[5][$ri][4] = $myfxbook['ref_pro'];
			$mass_acc[5][$ri][5] = $myfxbook['ref_bro'];//Ссылка на брокера с партнерской ссылкой. На иконке брокера
			$mass_acc[5][$ri][6] = $myfxbook['ico'];
			$mass_acc[5][$ri][7] = $myfxbook['bro_name'];
			$mass_acc[5][$ri][8] = $myfxbook['cur'];
			$ri++;
			}else
		if($myfxbook['agress']==0)
		{
			$mass_acc[0][$z][1] = $myfxbook['num_acc'];
			$mass_acc[0][$z][2] = $myfxbook['prim'];
			$mass_acc[0][$z][3] = $myfxbook['man'];
			
			$mass_acc[0][$z][4] = $myfxbook['ref_pro'];
			$mass_acc[0][$z][5] = $myfxbook['ref_bro'];//Ссылка на брокера с партнерской ссылкой. На иконке брокера
			$mass_acc[0][$z][6] = $myfxbook['ico'];
			$mass_acc[0][$z][7] = $myfxbook['bro_name'];
			$mass_acc[0][$z][8] = $myfxbook['cur'];
			$z++;
			}
	}	
}
$title1 = "Брокер";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Golden Bridge :: Счета</title>
<link rel="stylesheet" href="content/css.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>

<body>

<section class="container_text">
    <div class="block_info">
        <div>
        
        	<div id="conservative_style" class="stabl s_box_shadow">Счета с консервативными стилями торговли</div>
            
            <table cellpadding="10">
           		<tr>
                	<th width="80px"><? echo $title1;?></th>
                	<th width="150px">Название</th>
                    <th>Система</th>
                    <th>Инвестиции</th>
                    <th>Средняя Доходность (мес)</th>
                    <th>Доходность (всего)</th>
                    <th>Мониторинг</th>
                </tr>
                
                <? 
				if(isset($mass_acc[1]) && count($mass_acc[1])!=0) 
				{
					foreach($mass_acc[1] as $acc) 
						{
						$mfb=0;
						for($index=0;$index<count($m_myfxbook);$index++)
						{
							
							if($acc[1]==$m_myfxbook[$index][0])
								{
									$mfb = $index;
									break;
								}
							};
				
                ?>
            	<tr>
                	<td><a href="<? echo $acc[5];?>" target="_blank"><img src="content/brokers/<? echo $acc[6];?>"></a></td>
                    <td style="font-size:10px;"><a href="<? echo $acc[5];?>" target="_blank"><? echo $m_myfxbook[$mfb][6];?></a></td>
                    <td><a href="<? echo $acc[4];?>" target="_blank"><? echo $acc[3];?></a></td>
                    <td style="text-align:"><? echo money_format_1($m_myfxbook[$mfb][3]);?><? echo " ".$acc[8];?></td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo $m_myfxbook[$mfb][5];?>%
                    </td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo money_format_1($m_myfxbook[$mfb][1]);?><? echo " ".$acc[8];?>
                    </td>
                    <td> <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/<? echo $acc[1]; ?>" target="_blank"><img  style="width:250px;" border="0" src="http://widgets.myfxbook.com/widgets/<? echo $acc[1]; ?>/large.jpg"/></a></td>
                </tr>
                	<? } 
					
					};?>
               
            </table> 
               
        </div>
    </div>
   	<div class="block_info">
        <div>
        
        	<div id="mixed_style" class="mma s_box_shadow">Счета со смешанными стилями торговли</div>
            <table cellpadding="10">
           		<tr>
                	<th width="80px"><? echo $title1;?></th>
                	<th width="150px">Название</th>
                    <th>Система</th>
                    <th>Инвестиции</th>
                    <th>Средняя Доходность (мес)</th>
                    <th>Доходность (всего)</th>
                    <th>Мониторинг</th>
                </tr>
                
                <?
				if(isset($mass_acc[2]) && count($mass_acc[2])!=0) 
				{
				foreach($mass_acc[2] as $acc) 
					{
						$mfb=0;
						for($index=0;$index<count($m_myfxbook);$index++)
						{
							
							if($acc[1]==$m_myfxbook[$index][0])
								{
									$mfb = $index;
									break;
								}
							};
                ?>
            	<tr>
                	<td><a href="<? echo $acc[5];?>" target="_blank"><img src="content/brokers/<? echo $acc[6];?>"></a></td>
                    <td style="font-size:10px;"><a href="<? echo $acc[5];?>" target="_blank"><? echo $m_myfxbook[$mfb][6];?></a></td>
                    <td><a href="<? echo $acc[4];?>" target="_blank"><? echo $acc[3];?></a></td>
                    <td style="text-align:"><? echo money_format_1($m_myfxbook[$mfb][3]);?><? echo " ".$acc[8];?></td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo $m_myfxbook[$mfb][5];?>%
                    </td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo money_format_1($m_myfxbook[$mfb][1]);?><? echo " ".$acc[8];?>
                    </td>
                    <td> <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/<? echo $acc[1]; ?>" target="_blank"><img  style="width:250px;" border="0" src="http://widgets.myfxbook.com/widgets/<? echo $acc[1]; ?>/large.jpg"/></a></td>
                </tr>
                	<? } 
				}
					?>
               
            </table> 
               
        </div>
    </div>
    <div class="block_info">
        <div>
        
        	<div id="agress_style" class="agress s_box_shadow"> Счета с агрессивными стилями торговли</div>
            <table cellpadding="10">
           		<tr>
                	<th width="80px"><? echo $title1;?></th>
                	<th width="150px">Название</th>
                    <th>Система</th>
                    <th >Инвестиции</th>
                    <th>Средняя Доходность (мес)</th>
                    <th>Доходность (всего)</th>
                    <th>Мониторинг</th>
                </tr>
                
                <? 
				if(isset($mass_acc[3]) && count($mass_acc[3])!=0)
				{
				foreach($mass_acc[3] as $acc) 
					{
						$mfb=0;
						for($index=0;$index<count($m_myfxbook);$index++)
						{
							
							if($acc[1]==$m_myfxbook[$index][0])
								{
									$mfb = $index;
									break;
								}
							};
                ?>
            	<tr>
                	<td><a href="<? echo $acc[5];?>" target="_blank"><img src="content/brokers/<? echo $acc[6];?>"></a></td>
                    <td style="font-size:10px;"><a href="<? echo $acc[5];?>" target="_blank"><? echo $m_myfxbook[$mfb][6];?></a></td>
                    <td><a href="<? echo $acc[4];?>" target="_blank"><? echo $acc[3];?></a></td>
                    <td style="text-align:"><? echo money_format_1($m_myfxbook[$mfb][3]);?><? echo " ".$acc[8];?></td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo $m_myfxbook[$mfb][5];?>%
                    </td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo money_format_1($m_myfxbook[$mfb][1]);?><? echo " ".$acc[8];?>
                    </td>
                    <td> <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/<? echo $acc[1]; ?>" target="_blank"><img  style="width:250px;" border="0" src="http://widgets.myfxbook.com/widgets/<? echo $acc[1]; ?>/large.jpg"/></a></td>
                </tr>
                	<? } 
					
				  }?>
               
            </table>  

               
        </div>
    </div>
    
    
    
    <!--Партфель 1-->
<div class="block_info">
        <div>
        
        	<div id="portfolio_1" class="gold s_box_shadow"> Портфель #1</div>
            <table cellpadding="10">
           		<tr>
                	<th width="80px"><? echo $title1;?></th>
                	<th width="150px">Название</th>
                    <th>Система</th>
                    <th >Инвестиции</th>
                    <th>Средняя Доходность (мес)</th>
                    <th>Доходность (всего)</th>
                    <th>Мониторинг</th>
                </tr>
                
                <? 
				if(isset($mass_acc[4]) && count($mass_acc[4])!=0)
				{
				foreach($mass_acc[4] as $acc) 
					{
						$mfb=0;
						for($index=0;$index<count($m_myfxbook);$index++)
						{
							
							if($acc[1]==$m_myfxbook[$index][0])
								{
									$mfb = $index;
									break;
								}
							};
							
						//Исходя из ссылки на массив с данными по  счету mfb посчитать результаты по портфелю
							
                ?>
            	<tr>
                	<td><a href="<? echo $acc[5];?>" target="_blank"><img src="content/brokers/<? echo $acc[6];?>"></a></td>
                    <td style="font-size:10px;"><a href="<? echo $acc[5];?>" target="_blank"><? echo $m_myfxbook[$mfb][6];?></a></td>
                    <td><a href="<? echo $acc[4];?>" target="_blank"><? echo $acc[3];?></a></td>
                    <td style="text-align:"><? echo money_format_1($m_myfxbook[$mfb][3]);?><? echo " ".$acc[8];?></td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo $m_myfxbook[$mfb][5];?>%
                    </td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo money_format_1($m_myfxbook[$mfb][1]);?><? echo " ".$acc[8];?>
                    </td>
                    <td> <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/<? echo $acc[1]; ?>" target="_blank"><img  style="width:250px;" border="0" src="http://widgets.myfxbook.com/widgets/<? echo $acc[1]; ?>/large.jpg"/></a></td>
                </tr>
                	<? } 
					
				  }?>
               
            </table>  
               
               
        </div>
    </div>    
    
        <!--Партфель 2-->
<div class="block_info">
        <div>
        
        	<div id="portfolio_2" class="gold s_box_shadow"> Портфель #2</div>
            <table cellpadding="10">
           		<tr>
                	<th width="80px"><? echo $title1;?></th>
                	<th width="150px">Название</th>
                    <th>Система</th>
                    <th >Инвестиции</th>
                    <th>Средняя Доходность (мес)</th>
                    <th>Доходность (всего)</th>
                    <th>Мониторинг</th>
                </tr>
                
                <? 
				if(isset($mass_acc[5]) && count($mass_acc[4])!=0)
				{
				foreach($mass_acc[5] as $acc) 
					{
						$mfb=0;
						for($index=0;$index<count($m_myfxbook);$index++)
						{
							
							if($acc[1]==$m_myfxbook[$index][0])
								{
									$mfb = $index;
									break;
								}
							};
                ?>
            	<tr>
                	<td><a href="<? echo $acc[5];?>" target="_blank"><img src="content/brokers/<? echo $acc[6];?>"></a></td>
                    <td style="font-size:10px;"><a href="<? echo $acc[5];?>" target="_blank"><? echo $m_myfxbook[$mfb][6];?></a></td>
                    <td><a href="<? echo $acc[4];?>" target="_blank"><? echo $acc[3];?></a></td>
                    <td style="text-align:"><? echo money_format_1($m_myfxbook[$mfb][3]);?><? echo " ".$acc[8];?></td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo $m_myfxbook[$mfb][5];?>%
                    </td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo money_format_1($m_myfxbook[$mfb][1]);?><? echo " ".$acc[8];?>
                    </td>
                    <td> <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/<? echo $acc[1]; ?>" target="_blank"><img  style="width:250px;" border="0" src="http://widgets.myfxbook.com/widgets/<? echo $acc[1]; ?>/large.jpg"/></a></td>
                </tr>
                	<? } 
					
				  }?>
               
            </table>  
               
               
        </div>
    </div>    

    
<!--
Блок архивных счетов
-->


<div class="block_info">
        <div>
        
        	<div id="arhive" class="white s_box_shadow"> Счета в Архиве</div>
            <table cellpadding="10">
           		<tr>
                	<th width="80px"><? echo $title1;?></th>
                	<th width="150px">Название</th>
                    <th>Система</th>
                    <th >Инвестиции</th>
                    <th>Средняя Доходность (мес)</th>
                    <th>Доходность (всего)</th>
                    <th>Мониторинг</th>
                </tr>
                
                <? 
				if(isset($mass_acc[0]) && count($mass_acc[0])!=0)
				{
				foreach($mass_acc[0] as $acc) 
					{
						$mfb=0;
						for($index=0;$index<count($m_myfxbook);$index++)
						{
							
							if($acc[1]==$m_myfxbook[$index][0])
								{
									$mfb = $index;
									break;
								}
							};
                ?>
            	<tr>
                	<td><a href="<? echo $acc[5];?>" target="_blank"><img src="content/brokers/<? echo $acc[6];?>"></a></td>
                    <td style="font-size:10px;"><a href="<? echo $acc[5];?>" target="_blank"><? echo $m_myfxbook[$mfb][6];?></a></td>
                    <td><a href="<? echo $acc[4];?>" target="_blank"><? echo $acc[3];?></a></td>
                    <td style="text-align:"><? echo money_format_1($m_myfxbook[$mfb][3]);?><? echo " ".$acc[8];?></td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo $m_myfxbook[$mfb][5];?>%
                    </td>
                    <td class="<? if($m_myfxbook[$mfb][5]>0) echo "profit"; else  echo "lost"; ?>">
						<? echo money_format_1($m_myfxbook[$mfb][1]);?><? echo " ".$acc[8];?>
                    </td>
                    <td> <a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/<? echo $acc[1]; ?>" target="_blank"><img  style="width:250px;" border="0" src="http://widgets.myfxbook.com/widgets/<? echo $acc[1]; ?>/large.jpg"/></a></td>
                </tr>
                	<? } 
					
				  }?>
               
            </table>  
               
               
        </div>
    </div>
    </section>




</body>
</html>