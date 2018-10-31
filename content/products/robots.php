<?

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
			//
			$m_myfxbook[$zu][5] = (double) $xml_data->accounts->account[$zu]->monthly; // 
			$m_myfxbook[$zu][6] = $xml_data->accounts->account[$zu]->name;// Название счета в системе Myfxbook
			$m_myfxbook[$zu][7] =  round($per,2);

			$zu++;
		}
	$url = "http://www.myfxbook.com/api/logout.xml?session=$sess";
	$logout = file_get_contents($url);
	$xml_logout = simplexml_load_string($logout);
	
}

$query = "SELECT 
 `products`.`id` as `Pro_id`,
 `products`.`name` as `Pro_Name`,
  `accaunt_management`.id as `id_man`,
  accaunt_management.name as `acc_manadger`,
  myfxbook.name,
  myfxbook.num_acc,
  myfxbook.id_schet_bro,
  myfxbook.id_acc,
  myfxbook.agress,
  myfxbook.prim,
  myfxbook.`show`,
  myfxbook_acc.login,
  myfxbook_acc.pass,
  myfxbook_acc.id_user,
  myfxbook_acc.`default`,
  `products`.`price`
FROM
  products
  Left JOIN accaunt_management ON (accaunt_management.`id_product` = `products`.`id`)
  Left JOIN myfxbook ON (accaunt_management.`id_main_myfxbook` = myfxbook.id_schet_bro)
  Left JOIN myfxbook_acc ON (myfxbook.id_acc = myfxbook_acc.id)
Where
  `products`.`id_type` = 1
";
  $myfxbook_acc = $db_gb->select($query);
$zu=0;
foreach($myfxbook_acc as $myfxbook_acc)
	{
				$zu = $myfxbook_acc['Pro_id'];
				$robots[$zu][0] = $myfxbook_acc['Pro_id'];
				$robots[$zu][1] = $myfxbook_acc['Pro_Name'];
				$robots[$zu][5] = $myfxbook_acc['price'];
		foreach($m_myfxbook as $mass_temp)
		{
			if($myfxbook_acc['num_acc'] == $mass_temp[0])
			{
				
				$robots[$zu][2] = $mass_temp[1];
				$robots[$zu][3] = $mass_temp[5];
				$robots[$zu][4] = $mass_temp[7];
				$robots[$zu][6] = $mass_temp[0];
			}
		}
		
	}
	
//print_r($robots);
?><head>
<title>Golden Bridge :: Продукты :: Роботы</title>
</head>



<div class="history"><a href="index.php?link=abw" >Golden Bridge</a> :: <a href="index.php?link=products">Продукты</a> :: <a href="index.php?link=products&page=robots">Роботы</a></div>

<section class="container">
			<h1><span class="title">Роботы </span> </h1>
			<h2>Наша цель - автоматизировать все!</h2>

            
 </section>
<section class="container_pro">  
	
    <div class="block_info_robot stabl ">
         <div class="content_pro_robot s_box_shadow"  >
         
         	<a class=" bottn_rob" href="index.php?link=products&page=mrgray"><div style="position:relative;"><h3 >Mr. Gray</h3> <div class="best"  style="position:absolute; right:0; "></div> </div></a>
         </div>

    </div>
    <?
    
	?>
    <table class="t_pro" cellpadding="10">
           		<tr>
                	<th rowspan="2" width="100px"></th>
                	<th rowspan="2">Стратегия</th>
                    <th rowspan="2">Инструменты</th>
                    <th rowspan="2">Доходность</th>
                    <th rowspan="2">Статистика</th>
                    <th colspan="2">Условия</th>
                </tr>
            	<tr>
                	<td>Покупки</td>
                    
                </tr>
                <tr>
                	<td><a  class=" bottn_rob"  href="index.php?link=products&page=mrgray" ><div class="borderpicter"><img class="radius" src="content/img/robots/mrgray.jpg" width="128px"> </div></a></td>
                	<td>
                    	Корреляционные свойста торговых инструментов. Это практически трейдер, только лучше.
                    </td>
                    <td width="100px">EURUSD, GBPUSD, EURJPY, EURCHF, NZDUSD, EURNZD, и прочие</td>
                    <td><span class="profit"><? if(isset($robots[1][3]) && $robots[1][3]>0)echo money_format_1($robots[1][3]); else echo "-";?>%</span></td>
                    <td><a href="https://www.myfxbook.com/members/Lord_Zeus/golden-bridge-mr-gray-real/<? echo $robots[1][6];?>"  target="_blank"><img class="myfxbook" src="content/brokers/myfxbook.jpg" ></a></td>
                    <td width="80px"><span class="gold"><!--<? echo money_format_2($robots[1][5]);?> <span class="price_rub"> &#8381;</span>--> По запросу</span></td>
                    
                </tr>
            </table> 
    
    
    <div class="block_info_robot agress">
         <div class="content_pro_robot s_box_shadow"  >
         
         	<a  class=" bottn_rob" href="index.php?link=products&page=fant"><div  style="position:relative; "><h3>Global Fant</h3> </div></a>
         </div>

    </div>
    <table class="t_pro" cellpadding="10">
           		<tr>
                	<th rowspan="2" width="100px"></th>
                	<th rowspan="2">Стратегия</th>
                    <th rowspan="2">Инструменты</th>
                    <th rowspan="2">Доходность</th>
                    <th rowspan="2">Статистика</th>
                    <th colspan="2">Условия</th>
                </tr>
            	<tr>
                	<td>Покупки</td>
                    
                </tr>
                <tr>
                	<td><a  class=" bottn_rob"  href="index.php?link=products&page=fant"><div class="borderpicter"><img class="radius" src="content/img/robots/globalgant.jpg" width="128px"> </div></a></td>
                	<td>
                    	Робот расставляет сетку ордеров, которая формирует материал для работы робота. В него зашит мощный логический блок по анализу открытых позиций, которые он со временем закрывает с  прибылью или с убытком. Очень много вариантов настроек, которые критически влияют на прибыль с робота. 
                    </td>
                    <td width="100px">GBPUSD, EURAUD, EURGBP</td>
                    <td><span class="profit"><? if(isset($robots[3][3]) && $robots[3][3]>0)echo money_format_1($robots[3][3]); else echo "-";?>%</span></td>
                    <td><a href="https://www.myfxbook.com/portfolio/global-fant-low/<? echo $robots[3][6];?>"  target="_blank"><img class="myfxbook" src="content/brokers/myfxbook.jpg" ></a></td>
                    <td width="80px"><span class="gold"><? //echo money_format_2($robots[3][5]);?> По запросу <!--<span class="price_rub"> &#8381;</span>--></span></td>
                    
                </tr>
            </table> 
		
         <div class="block_info_robot agress">
         <div class="content_pro_robot s_box_shadow"  >
         
         	<a  class=" bottn_rob" href="index.php?link=products&page=spider"><div  style="position:relative; "><h3>spider man</h3> </div></a>
         </div>

    </div>
    <table class="t_pro" cellpadding="10" >
           		<tr>
                	<th rowspan="2" width="100px"></th>
                	<th rowspan="2">Стратегия</th>
                    <th rowspan="2">Инструменты</th>
                    <th rowspan="2">Доходность</th>
                    <th rowspan="2">Статистика</th>
                    <th colspan="2">Условия</th>
                </tr>
            	<tr>
                	<td>Покупки</td>
                    
                </tr>
                <tr>
                	<td><a  class=" bottn_rob"  href="index.php?link=products&page=spider"><div class="borderpicter"><img class="radius" src="content/img/robots/spiderman.jpg" width="128px"> </div></a></td>
                	<td>
                    	  Робот является продолжением концепции сеточников. Он был создан на основе GLOBAL FANT, но у него есть существенные отличия. Он работает текущими ордерами, с немедленным исполнением. Результат кардинально отличается.
                    </td>
                    <td width="100px">EURGBP, EURAUD</td>
                    <td><span class="profit"><? if(isset($robots[2][3]) && $robots[2][3]>0) echo money_format_1($robots[2][3]); else echo "-";?>%</span></td>
                    <td><a href="https://www.myfxbook.com/portfolio/global-fant-low/<? echo $robots[2][6];?>"  target="_blank"><img class="myfxbook" src="content/brokers/myfxbook.jpg" ></a></td>
                    <td width="80px"><span class="gold">
						<!--
						<? echo money_format_2($robots[2][5]);?> <span class="price_rub"> &#8381;</span>-->
                        По запросу
                        </span></td>
                    
                </tr>
            </table>
        
        
    
   	  <div class="block_info_robot mma">
         <div class="content_pro_robot s_box_shadow"  >
         
         	<a  class=" bottn_rob" href="index.php?link=products&page=locost"><div  style="position:relative; "><h3>Mr. Anderson</h3> </div></a>
         </div>

    </div>
    <table class="t_pro" cellpadding="10" >
           		<tr>
                	<th rowspan="2" width="100px"></th>
                	<th rowspan="2">Стратегия</th>
                    <th rowspan="2">Инструменты</th>
                    <th rowspan="2">Доходность</th>
                    <th rowspan="2">Статистика</th>
                    <th colspan="2">Условия</th>
                </tr>
            	<tr>
                	<td>Покупки</td>
                    
                </tr>
                <tr>
                	<td><a  class=" bottn_rob"  href="index.php?link=products&page=locost"><div class="borderpicter"><img class="radius" src="content/img/robots/mr.anderson.jpg" width="128px"> </div></a></td>
                	<td>
                    	Робот написан по принципу работы Мартингейла. Модификация интересна прежде всего вшитым, очень качественным, трендовым индикатором FL32. В данный момент проходит тестирование данного советника с индикатором разработанным по системе Уильема Ганна. Также данный робот локирует позиции после последнего усреднения и, если усреднение не срабатывает, закрывает убыток.  
                    </td>
                    <td width="100px">GBPUSD, EURGBP, EURNZD, USDCAD</td>
                    <td><span class="profit"><? if(isset($robots[5][3]) && $robots[5][3]>0) echo money_format_1($robots[5][3]);else "-";?>%</span></td>
                    <td><a href="https://www.myfxbook.com/members/Lord_Zeus/golden-bridge-mr-gray-real/<? echo $robots[5][6];?>"  target="_blank"><img class="myfxbook" src="content/brokers/myfxbook.jpg" ></a></td>
                    <td width="80px"><span class="gold">
						По запросу
						<!--<? echo money_format_2($robots[5][5]);?> <span class="price_rub"> &#8381;</span>--></span></td>
                    
                </tr>
            </table> 
            
            
            <!-- Про News Capture  -->
            <div class="block_info_robot mma">
         <div class="content_pro_robot s_box_shadow"  >
         
         	<a  class=" bottn_rob" href="index.php?link=products&page=news"><div  style="position:relative; "><h3>News Capture</h3><div class="recommended"  style="position:absolute; right:0; "></div> </div></a>
         </div>

    </div>
    <table class="t_pro" cellpadding="10" >
           		<tr>
                	<th rowspan="2" width="100px"></th>
                	<th rowspan="2">Стратегия</th>
                    <th rowspan="2">Инструменты</th>
                    <th rowspan="2">Доходность</th>
                    <th rowspan="2">Статистика</th>
                    <th colspan="2">Условия</th>
                </tr>
            	<tr>
                	<td>Покупка	</td>
                </tr>
                <tr>
                	<td><a  class=" bottn_rob"  href="index.php?link=products&page=news"><div class="borderpicter"><img class="radius" src="content/img/robots/newscapture.jpg" width="128px"> </div></a></td>
                	<td>
                    	Данный продукт создавался для торговли на новостях. Это молодой робот, но у него пока отличная статистика: ни 1й убыточной сделки, и прибыль очень высокая. Он сам устанавливает отложенные ордера и переводит stop loss в безубыток. Он умеет тралить и уничтожать ордера по определенным показаниям.   
                    </td>
                    <td width="100px">Любые</td>
                    <td>Ручная торговля</td>
                    <td></td>
                    <td width="80px"><span class="gold"><? echo money_format_2($robots[4][5]);?> <span class="price_rub"> &#8381;</span></span></td>
                </tr>
            </table> 
            <!-- Про News Capture  -->
            
            
          <div class="block_info_robot white">
         <div class="content_pro_robot s_box_shadow"  >
         
         	<a  class=" bottn_rob" href="index.php?link=products&page=sets"><div  style="position:relative; "><h3>тестирование</h3> </div></a>
         </div>

    </div>
    <table class="t_pro" cellpadding="10" border="1px" rules="all">
           		<tr>
                	<th width="100px"></th>
                	<th ></th>
                    
                </tr>
                <tr>
                	<td><a class=" bottn_rob" href="index.php?link=products&page=sets"><div class="borderpicter"><img class="radius" src="content/img/robots/presets.jpg" width="128px"> </div></a></td>
                	<td>
                    	  Данный раздел содержит информацию о тестировании торговых советников. Советники бывают разного типа, но протестировать можно только советники основанные на торговле на одной валютной паре и с правильно закаченными котировками. Правильное тестирование - это 50% успеха.
                    </td>
                    
                </tr>
            </table>    
            
            
            
    </section>
