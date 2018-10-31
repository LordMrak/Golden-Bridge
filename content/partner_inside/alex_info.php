<?
$query = "
SELECT 
  brokers.name,
  alex_invest2.id,
  alex_invest2.id_broker,
  alex_invest2.type_schet,
  alex_invest2.invest,
  alex_invest2.komiss,
  alex_invest2.add_money,
  alex_invest2.`comment`
FROM
  alex_invest2
  INNER JOIN brokers ON (alex_invest2.id_broker = brokers.id)
";
$invest_info=$db_gb->select($query);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Golden Bridge :: Алексей Дьячков</title>
<link rel="stylesheet" href="content/css.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="content/partner_inside/personal.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="content/partner_inside/content/modal/modal.css" type="text/css" media="screen" title="no title" charset="utf-8">
<script type="text/javascript" src="content/partner_inside/personal.js"></script>
<script type="text/javascript" src="content/partner_inside/content/modal/modal.js"></script>
</head>

<body>
<section class="container p_title">
			<h1><span class="title">Добро пожаловать в Личный Кабинет, Алексей Сергеевич.</span> </h1>
			<h2>Мы рады видеть Вас, о великий, в рядах наших партнеров</h2>
 </section>

<section class="container_text" style="border:3px; width:auto; padding:25px;"> 


<table class="table_partner inside_partner" >
            	<tr>
                	<th>
                    	Брокер
                    </th>
                    <th>Тип</th>
                    <th>Инвестировано</th>
                    <th>Комиссии</th>
                    <th>Доход ($)</th>
                    <th>% от инвестиции</th>
                    <th>Описание</th>
                </tr>
                <?
				$invest_all=0;
				$profit_all=0;
				$komiss_all=0;
				
                foreach($invest_info as $invest_info)
				{
					$invest_all+=$invest_info['invest'];
					//$profit_all+=$invest_info['add_money'];
					$komiss_all+=$invest_info['komiss'];
					
					$add_Money = $invest_info['add_money']-$invest_info['invest'];
					$profit_all+=$add_Money;
				?>
                <tr>
                	<td><? echo $invest_info['name']; ?></td>
                    <td><? echo $invest_info['type_schet']; ?></td>
                    <td><? echo money_format_1($invest_info['invest']); ?></td>
                    <td><? echo money_format_1($invest_info['komiss']); ?></td>
                    <td><? echo money_format_1($add_Money); ?></td>
                    <td><span class="gold"><? echo money_format_2($add_Money*100/$invest_info['invest']); ?>%</span></td>
                    <td class="discription"><? echo $invest_info['comment']; ?></td>
                </tr>
                <? } ?>
                <tr>
                	<td>
                    	Итого
                    </td>
                    <td>(<? echo money_format_1($invest_all+$komiss_all);?>)</td>
                    <td><? echo money_format_1($invest_all);?></td>
                    <td><? echo money_format_1($komiss_all);?></td>
                    <td><? echo money_format_1($profit_all);?></td>
                    <td><span class="gold"><? echo money_format_2($profit_all*100/$invest_all); ?>%</span></td>
                    <td></td>
                </tr>
            </table>
</section>

<section class="container p_title">
			<h1><span class="title">Инвестиционное предложение</span> </h1>
</section>
<section class="container_text" style="border:3px; width:auto; padding:25px;"> 

<div >Максимальный объем инвестиционных средств: <span class="gold">25 000$</span></div>

<table class="table_partner inside_partner" >
            	<tr>
                	<th>
                    	Брокер
                    </th>
                    <th>Тип</th>
                    <th>Объем инвестиций</th>
                    <th>Доходность стратегии</th>
                    <th>Описание</th>
                </tr>
                
                <tr>
                	<td>Alfa Forex</td>
                    <td>ПАММ</td>
                    <td>13 000$</td>
                    <td><span class="gold">~ 15%</span></td>
                    <td class="discription">ПАММ в Альфа форекс обладает сбалансированными настройками и использует в торговле самые прибыльные ветки (торговые комбинации валютных инструментов), что позволяет идеально сочетать умеренные риски возникновения временных просадок до 15% с доходностью в 20%/мес.</td>
                </tr>
                
                <tr>
                	<td>Alfa Forex</td>
                    <td>Отдельный счет</td>
                    <td>5 000$</td>
                    <td><span class="gold">~ 25%</span></td>
                    <td class="discription">Торговля ведется советником Spider Man. Данный советник реагирует только на изменение цены и открывает постоянно позиции на покупку и продажу актива. Мы используем свойство цены возвращаться после рывков роста и падения. Это позволяет работать циклами и закрывать постоянный небольшой процент прибыли. Данный советник является умеренно рискованным, прошел (успешно) тестирование на 2 реальных счетах, по сей день стоит на счете в 1000$ и доходность на данный момент 231% начиная с 25 Февраля 2016 года. (фактическая работа 6 месяцев)<br>
                    <a href="http://g-bridge.ru/index.php?link=products&page=spider" target="_blank">Ссылка на страницу робота!</a><br>
					<a href="http://www.myfxbook.com/members/Lord_Zeus/golden-bridge--mr-gray/1531527" target="_blank">Ссылка на статистику робота!</a>
					</td>
                </tr>
                
                <tr>
                	<td>InstaForex</td>
                    <td>Отдельный счет</td>
                    <td>2 000$</td>
                    <td><span class="gold">~ 200%</span></td>
                    <td class="discription">Торговля ведется советником Mr. Gray. В данном счете предлагается воспользоваться последней версией робота разработанной компанией GOLDEN BRIDGE. Настройка увеличивает торговые объемы в 20 раз и проверяет новым методом сигнал с дополнительными проверками и закрытием убытка, в случае отсутствия положительного результата по ветке и отработке сигнала в ноль! Это приносит фантастический результат на рынке в период без экстримальных валотильностей. <span class="green">Ожидаемый доход ~ 200 - 250% в месяц</span>. Это минимальная оценка. Риски при этом соответствующие.</td>
                </tr>
                
                <tr>
                	<td>InstaForex</td>
                    <td>Отдельный счет</td>
                    <td>2 000$</td>
                    <td><span class="gold">~ 200%</span></td>
                    <td class="discription">Торговля ведется советником Spider Man. В данном счете предлагается воспользоваться настройками с повышенным риском и соответсвенно с хорошей доходностью. <span class="green">Примерно 200% - 250% в месяц</span> можно получить прибыли по итогу работы стратегии в период 4-6 месяцев. Стратегию мы распределим на 2-3 валютные пары с одинаковым риском. Соответственно повысим вероятность успеха.</td>
                </tr>
                
                 <tr>
                	<td>
                    	Не инвестировано
                    </td>
                    <td></td>
                    <td>3 000$</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <tr>
                	<td>
                    	Итого
                    </td>
                    <td></td>
                    <td>25 000$</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
</section>

</body>
</html>