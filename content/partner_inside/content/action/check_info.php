<?
session_start();

include("../../../../connection/con_base.php");
include("../../../../templates/check_all_income.php");


$val=get_var_post('val');
$obj=get_var_post('obj');

if($val!='' && $val!=NULL)
{
	
	$object = new Check_dif_reg();
		
		switch ($obj)
		{
			case 'name': $object->check_names($val,'мало сиволов',3);
			break;
			
			case 'number': $object->check_numbers($val,'',5);
			break;
			
			case 'date': $object->check_date($val);
			break;
			
			case 'tel': $object->check_tel($val);
			break;
		}

	
//print_r($object);
if($object->error[0][1] == 0){	
?>

<div>
	<div>Ошибка!</div>
    <div>Формат поля не соответствует. <? echo $object->error[0][0]; ?></div>
    <input type="hidden" value="0" name="check_data" id="check_data">
</div>
<? }else
{
?>

<input type="hidden" value="1" name="check_data" id="check_data">

<? }

}?>
