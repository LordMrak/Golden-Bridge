<?
if(isset($type_oper)){
	switch ($type_oper){	
		case "add_bank":include('content/partner_inside/content/action/idata/add_bank_end.php'); break;
		case "edit_bank":include('content/partner_inside/content/action/idata/edit_bank_end.php'); break;
		case "del_bank":include('content/partner_inside/content/action/idata/del_bank_end.php'); break;
		
		case "add_wm":include('content/partner_inside/content/action/idata/add_wm_end.php'); break;
		case "edit_wm":include('content/partner_inside/content/action/idata/edit_wm_end.php'); break;
		case "del_wm":include('content/partner_inside/content/action/idata/del_wm_end.php'); break;
		
		case "add_qiwi":include('content/partner_inside/content/action/idata/add_qiwi_end.php'); break;
		case "edit_qiwi":include('content/partner_inside/content/action/idata/edit_qiwi_end.php'); break;
		case "del_qiwi":include('content/partner_inside/content/action/idata/del_qiwi_end.php'); break;
	}
}
 
	
$query='SELECT 
  partners.id,
  partners.name,
  partners.id_partner,
  partners1.name as `him_partner`,
  partners.work,
  partners_pay_system.name_partner as `rang`,
  partners_pay_system.proc,
  partners_pay_system.link_pic_man,
  partners_pay_system.link_pic_woman,
  users.sex,
  users.`date`,
  users.email,
  users.telefon
FROM
  partners
  LEFT OUTER JOIN users_partner ON (partners.id = users_partner.id_partner)
  LEFT OUTER JOIN users ON (users_partner.id_user = users.id)
  LEFT OUTER JOIN partners_pay_system ON (partners.id_rang = partners_pay_system.id)
  LEFT OUTER JOIN partners partners1 ON (partners.id_partner = partners1.id)
  where 
  users.id = ?
  ';
$rezult=$db_gb->selectRow($query,$_SESSION['MM_Id']);
	
	$query = "SELECT 
		  `id`,
		  `id_partner`,
		  `fio`,
		  `card_number`,
		  `name_bank`,
		  `pc`,
		  `kc`,
		  `bik`,
		  `inn_bank`,
		  `kpp`,
		  `work`
		FROM 
	  `partner_bank` where `id_partner` = ?;";
	  $rezult2       = $db_gb->select($query,$rezult['id']);
	  $rezult2_count = $db_gb->queryInfo['num_rows'];
	  
?>



<script src="content/partner_inside/content/idata.js"></script>



<div class="in_rang">
    <span class="gold"><? echo $rezult['rang'];?></span>
    <img class="ico_rang" src="content/img/ico/<? if($rezult['sex']=='m') echo $rezult['link_pic_man'];else	 echo $rezult['link_pic_woman']; ?>" width="40px">
    <img class="ico_gbg" src="content/img/gbg.png" width="200px">
</div>


<div class="text_block">Привлекающий агент: <span class="gold"><? echo $rezult['name'];?></span> </div>
<div class="text_block">Пол: <span><? if($rezult['sex']=='m') echo "Мистер"; else echo "Мадам"; ?></span> </div>
<div class="text_block">Email: <span><? echo $rezult['email'];?></span></div>
<div class="text_block">Телефон: <span><? echo $rezult['telefon'];?></span></div>
<div class="text_block">Дата регистрации: <span><? echo $rezult['date'];?></span></div>
<div class="text_block">Текущий процент: <span class="gold"><? echo $rezult['proc'];?>%</span></div>

<table class="table_partner inside_partner">
	<tr>
    	<th colspan="10"> Банковские реквизиты</th>
        <th > <img id="<? echo $rezult['id'];?>" name="modal2" class="add_bank add_" src="content/img/ico/add.png" width="16px"></th>
    </tr>
    <tr>
        <th>ФИО Держателя</th>
        <th>Название банка</th>
        <th>Номер карты</th>
        <th>р/с</th>
        <th>к/с</th>
        <th>БИК</th>
        <th>ИНН Банка</th>
        <th>КПП Банка</th>
        <th>Работает</th>
        <th></th>
        <th></th>
    </tr>
    <? foreach($rezult2 as $rezult2) {?>
    <tr>
        <td><? echo $rezult2['fio'];?></td>
        <td><? echo $rezult2['name_bank'];?></td>
        <td><? echo $rezult2['card_number'];?></td>
        <td><? echo $rezult2['pc'];?></td>
        <td><? echo $rezult2['kc'];?></td>
        <td><? echo $rezult2['bik'];?></td>
        <td><? echo $rezult2['inn_bank'];?></td>
        <td><? echo $rezult2['kpp'];?></td>
        <td>
			<? if($rezult2['work']=='y'){?>
				<img src="content/img/ico/tick.png" width="16px">
			<? }else{?>
            	<img src="content/img/ico/delete.png" width="16px">
            <? }?>
        </td>
        <td>
    		<a  id="<? echo $rezult2['id'];?>" href="#" base="edit_bank" name="modal2" class="button_edit"></a>
        </td>
        <td>
            <a id="<? echo $rezult2['id'];?>" href="#" base="del_bank" name="modal2" class="button_remove">  </a>
        </td>
        
    </tr>
    <? }?>
</table>
<br>
<?
	$query = "SELECT 
				  `id`,
				  `id_partner`,
				  `wmr`,
				  `wmz`,
				  `work`
				FROM 
				  `partner_webmoney` where `id_partner` = ?;";
	  $rezult3       = $db_gb->select($query,$rezult['id']);
	  $rezult3_count = $db_gb->queryInfo['num_rows'];
?>
<table class="table_partner inside_partner">
	<tr>
    	<th colspan="4"> Web Money</th>
        <th > <img id="<? echo $rezult['id'];?>" name="modal2" class="add_wm add_" src="content/img/ico/add.png" width="16px"></th>
    </tr>
    <tr>
        <th>WMR</th>
        <th>WMZ</th>
        <th>Работает</th>
        <th></th>
        <th></th>
    </tr>
    <? foreach($rezult3 as $rezult3) {?>
    <tr>
        <td><? echo $rezult3['wmr'];?></td>
        <td><? echo $rezult3['wmz'];?></td>
        <td><? if($rezult3['work']=='y'){?>
				<img src="content/img/ico/tick.png" width="16px">
			<? }else{?>
            	<img src="content/img/ico/delete.png" width="16px">
            <? }?>
        </td>
        <td>
    		<a  id="<? echo $rezult3['id'];?>" href="#wm_data" base="edit_wm" name="modal2" class="button_edit"></a>
        </td>
        <td>
            <a id="<? echo $rezult3['id'];?>" href="#wm_data" base="del_wm" name="modal2" class="button_remove">  </a>
        </td>
        
    </tr>
    <? }?>
</table>

<br>
<?
	$query = "SELECT 
				  `id`,
				  `id_partner`,
				  `number`,
				  `limit`,
				  `work`
				FROM 
				  `partner_qiwi` where `id_partner` = ?;";
	  $rezult       = $db_gb->select($query,$rezult['id']);
	  $rezult_count = $db_gb->queryInfo['num_rows'];
?>
<table id="qiwi_data" class="table_partner inside_partner">
	<tr>
    	<th colspan="4"> QIWI Кошельки</th>
        <th > <img id="<? echo $rezult['id'];?>" name="modal2" class="add_qiwi add_" src="content/img/ico/add.png" width="16px"></th>
    </tr>
    <tr>
        <th>Номер QIWI</th>
        <th>Лимит</th>
        <th>Работает</th>
        <th></th>
        <th></th>
    </tr>
    <? foreach($rezult as $rezult) {?>
    <tr>
        <td><? echo $rezult['number'];?></td>
        <td><? echo $rezult['limit'];?></td>
        <td><? if($rezult['work']=='y'){?>
				<img src="content/img/ico/tick.png" width="16px">
			<? }else{?>
            	<img src="content/img/ico/delete.png" width="16px">
            <? }?>
        </td>
        <td>
    		<a  id="<? echo $rezult['id'];?>" href="#qiwi_data" base="edit_qiwi" name="modal2" class="button_edit"></a>
        </td>
        <td>
            <a id="<? echo $rezult['id'];?>" href="#qiwi_data" base="del_qiwi" name="modal2" class="button_remove">  </a>
        </td>
        
    </tr>
    <? }?>
</table>
