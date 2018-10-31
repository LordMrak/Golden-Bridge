<?
$way = "content/";
switch ($link)
                {
                    case 'main':
                    include($way.'main/all_info.php');
                    break;
                 // Работа со справочником   
                    case 'catalogs': 
                    include($way.'catalogs/catalogs.php');
                    break;
				
						//Страница редактирования компании брокера
						case 'comp_broc':
						include($way.'catalogs/pages/comp_broc.php');
						break;
						// Работа  с символами
						case 'cat_simb': 
						include($way.'catalogs/pages/comp_broc.php');
						break;
						// Работа  с пользователями
						case 'cat_users': 
						include($way.'catalogs/pages/users.php');
						break;
						
						// Работа  с клиентами
						case 'cat_client': 
						include($way.'catalogs/pages/client.php');
						break;
						// Работа  с filds for клиентами
						case 'cat_client_fild': 
						include($way.'catalogs/pages/cat_client_fild.php');
						break;
						
						// Работа  с клиентами
						case 'cat_partners': 
						include($way.'catalogs/pages/partners.php');
						break;
						// Работа  с filds for partners
						case 'cat_part_fild': 
						include($way.'catalogs/pages/cat_part_fild.php');
						break;
						
						// Работа  с типами для событий
						case 'cat_event_type': 
						include($way.'catalogs/pages/event_type.php');
						break;
					//Загрузка данных
						// Работа с загрузкой данных
						case 'download_data': 
						include($way.'download/trade_oper/trade_oper.php');
						break;
						
					default:
					include($way.'/main/all_info.php');
                    break;
				}

?>