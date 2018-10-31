
<script>

</script>
<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");
	
	
	$obj=get_var_post('obj');
	
	

	
	if($obj!="")
{
	
	 $query='
		SELECT 
		 name
		FROM
		  client_type_filds
        WHERE
          name REGEXP ? ;';

	$rezult=$db_gb->select($query,$obj);
	
}
else
{
	$query='
		SELECT 
		 name
		FROM
		  client_type_filds';

	$rezult=$db_gb->select($query);
	
	}

?>


<table class="table_1">
<tr>
	<th>
    	id
    </th>
    <th>
    	Название
    </th>
    <th>
    </th>
    <th>
    	
    </th>
</tr>

<? 
if($rezult)
{
	foreach($rezult as $rezult)
	{
?>
<tr>
	<td>
    	<? echo $rezult['id'];?>
    </td>
    <td>
    	<? echo $rezult['name'];?>
    </td>
    <td>
    	<a  id="<? echo $rezult['id'];?>" href="#dialog1" name="modal" class="button_edit"></a>
    </td>
    <td>
    	<a id="<? echo $rezult['id'];?>" class="button_remove" href="#" >  </a>
    </td>
</tr>
<?	
	}
}
?>
</table>