<?
session_start();
if (isset($_COOKIE['GB_RU_visit'])) $cnt=$_COOKIE['GB_RU_visit'];
include("../../templates/check_all_income.php");
include("../../connection/con_base.php");
 $place=get_var_post('place');
 $link=get_var_post('link');
 
  $ats=get_var_post('ats');

$sname=get_var_post('sname');
$error_b = false;
if(isset($sname))
{
	$name=get_var_post('name');
	/*$summ=get_var_post('summ');*/
	$email=get_var_post('email');
	$tel=get_var_post('tel');
	$ats=get_var_post('ats');

	$object = new Check_dif_reg();

			$object->check_names($name,'Имя',3);
			
			$object->check_names($sname,'Фамилия',3);
			$object->check_tel($tel);
			/*$object->check_numbers($summ,'Сумма');*/
			$object->check_email($email);
			$texterror = "";
			
			foreach($object->error as $key=>$value_)
			{
				if($value_[1]==0){
					
					$texterror.=$value_[0]."<br />"; 
					
					$error_b=true;//Если есть хоть 1 ошибка - маркеру присваивается значение false и данные формы не будут обработаны.
					}
			}
			
			//$texterror=str_pad($texterror,strlen($texterror)-1);
}
?>
<!--<script type="text/javascript" src="content/products/robots/mrgray.js"></script>-->

<script>
	
	$('#zakaz').click(function(e){
			
			$('#boxes').load('content/products/buy_product.php',{
				'sname':$('#sname').val(),
				'name':$('#name').val(),
				/*'summ':$('#summ').val(),*/
				'email':$('#email').val(),
				'tel':$('#tel').val(),
				'ats':$("select[name=ats] option:selected").text(),
				'place': $('#place').val(),
				'link': $('#link').val()
				});
		});
		
		$('.window .close').click(function (e) {
		
			
			$('#mask, .window').hide();
	
   		 }); 
</script>
<?		
				
if(($error_b==true && isset($sname))||!isset($sname))
{
?>
<div id="dialog1" class="window" <? if(isset($sname)) echo 'style="display: block;"'; ?>  >
          <div class="d-header">
            	<div class="head">Заказ звонка</div>
            	<table class="table_modal">
                	<tr>
                    	<td><input id="sname" type="text" value="<? if(isset($sname)) echo $sname; ?>" /></td>
                        <td >Фамилия</td>
                    </tr>
                    <tr>
                    	<td><input id="name" type="text" value="<? if(isset($name)) echo $name; ?>" /> </td>
                        <td>Имя</td>
                    </tr>
                    <!--<tr>
                    	<td><input id="summ" type="text" value="<? if(isset($summ)) echo $summ; ?>" /> </td>
                        <td >Сумма инвестиций ($)</td>
                    </tr>-->
                    <tr>
                    	<td><input id="email" type="email" value="<? if(isset($email)) echo $email; ?>" /></td>
                        <td >email</td>
                    </tr>
                    <tr>
                    	<td><input id="tel" type="tel" value="<? if(isset($tel)) echo $tel; ?>" /> </td>
                        <td >телефон</td>
                    </tr>
                    
                    <tr>
                    	<td>
                       	  <select name="ats">
                            	<option <? if(!isset($ats) || $ats=='Новичек' ){?>selected<? }?> value="nub" > Новичек</option>
                                <option <? if(isset($ats) && $ats=='Инвестор'){?>selected<? }?> value="inv"> Инвестор</option>
                                <option <? if(isset($ats) && $ats=='Трейдер'){?>selected<? }?> value="tre"> Трейдер</option>
                                <option <? if(isset($ats) && $ats=='Программист'){?>selected<? }?> value="pro"> Программист</option>
                            </select>
                        </td>
                        <td>Опыт</td>
                    </tr>
                    <tr>
                    	<td align="right" colspan="2" style="vertical-align:central"><input name="check_data" style="width:10px;" id="use_pers" type="checkbox" checked /> 
                        Согласие на обработку персональных данных	</td>
                    </tr>
                    <tr>
                    	<td colspan="2" style="padding:15px;"> Выбранный продукт: <span><? echo $place;  ?></span> </td>
                        
                    </tr>
                </table>
 				<input id="place" value="<? echo $place; ?>" type="hidden">
                <input id="link" value="<? echo $link; ?>" type="hidden">
  </div>
          
          <div class="d-login"><input id="zakaz" type="button" value="ЗАКАЗАТЬ" alt="Send" title="Заказ"  /></div>  
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
		  <?
		  
			if(isset($sname)){
				
				?>
                	<div style="font-style:italic; font-weight:900;">Ошибки в следующих разделах:</div>
					<div class="text_error_modal"> <? echo $texterror;?> </div>
				<?
			}
		  
		  ?>
  	  </div>
      
<?
}else
{
	if(isset($email) && $email!='')
	{
		
		$from =  iconv('utf8', 'cp1251','Golden Bridge Ltd. <no-reply@g-bridge.ru>');
		
		$title = "Заказ звонка от ".$sname." ".$name;

		$to    = 'anton@g-bridge.ru, val@g-bridge.ru, galeant@ya.ru';//

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
		$headers .= 'From: '.$from;
		
		

		$message = '
		<html>
		<head>
		  <title>Новое обращение с сайта www.g-bridge.ru</title>
		</head>
		<body>

		  ФИО отправителя: <strong>'.$sname.' '.$name.'</strong><br />
		  email: <strong>'.$email.'</strong><br />
		  Телефон: '.$tel.'<br />
		  Опыт: '.$ats.'<br />
		  Посещал сайт: '.$cnt.' раз<br />
		  Продукт: <a href="'.$link.'" target="_blank">'.$place.' </a>
		
		</body>
		</html>
		';
	
	
	//дОбавление в БАзу Данных обращения с сайта
	
	
	$query='INSERT INTO 
  `massage_site`
	(
	  `F`,
	  `I`,
	  `email`,
	  `tel`,
	  `exp`,
	  `place`,
	  `date`,
	  `visit`) 
	VALUE (
	  ?,
	  ?,
	  ?,
	  ?,
	  ?,
	  ?,
	  ?,
	  ?);';

	$insert_result=$db_gb->insert($query,$sname, $name, $email, $tel, $ats, $place, date("Y-m-d H:i:s"),$cnt);
	

if(mail($to, $title, $message,$headers)) 
{
?>	
	
<div id="dialog1" class="window" style="display:block;">
          <div class="d-header">
            	<div class="head" style="padding:25px 5px;">Спасибо за заказ. Мы скоро с Вами свяжемся.</div>
                <!--<div><? echo $message;?></div>-->
 
		</div>
          
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div>
		 
  	  </div>	
<?	
}else
{?>
	<div id="dialog1" class="window" style="display:block;">
          <div class="d-header">
            	<div class="head" style="padding:25px 5px;">Сообщение не было отправлено. Попробуйте чуть позже.</div>
 
		</div>
          
          <div class="d-login"><input  class="close" type="button" value="ЗАКРЫТЬ"  /></div> 
		 
  	  </div>
	
	<? }
}	


}
?>