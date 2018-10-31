<? 
$query="SELECT 
  `id`,
  `id_partner`,
  `F`,
  `I`,
  `O`,
  `sex`,
  `date`,
  `date_berth`,
  `comment`,
  `work`,
  `tel`,
  `email`,
  `city`
FROM 
  `clients`
where
	`id` = ?  
  ;";
$rezult=$db_gb->selectRow($query, $client);

$query="SELECT 
  client_filds.id_client,
  client_filds.id_fild,
  client_filds.id,
  client_filds.value,
  client_type_filds.name
FROM
  client_filds
  INNER JOIN client_type_filds ON (client_filds.id_fild = client_type_filds.id)
where
	`id_client` = ?  
  ;";
$rezult2 = $db_gb->select($query, $id);
?>


<div class="cl_title">Общая информация</div>
<div class="info_block_1">
Пол <div><? if( $rezult['sex'] == 'm') echo '<img src="../../../img/ico/user_man.png" width="28px">'; else echo '<img src="../../../img/ico/user_woman.png" width="28px">'; ?></div>
</div>

<div class="info_block_1">
Дата регистрациии <div><? echo $rezult['date'];?> </div> 
</div>
<div class="info_block_1">
Дата рождения
</div>
<div class="info_block_1">
Комментарий
</div>
<div class="info_block_1">
Работаем?
</div>
<div class="info_block_1">
Город
</div>
<div class="info_block_1">
Сколько счетов:
</div>