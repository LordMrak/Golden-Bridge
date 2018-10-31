<?
include("../../../../../../../../connection/con_base.php");
include("../../../../../../../../templates/check_all_income.php");

$page_now=get_var_post('page_now');
$step=get_var_post('step');

$query='
		SELECT 
		  partners.id,
		  partners.name,
		  partners_type.name as `type_part`,
		  partners1.name as `him_part`,
		  partners.dinamic,
		  partners.work,
		  partners.comment,
		  partners_pay_system.name_partner,
		  partners_pay_system.proc,
		  partners_pay_system.link_pic_man,
		  partners_pay_system.link_pic_woman,
		  users.sex
		FROM
		  partners_type
		  INNER JOIN partners ON (partners_type.id = partners.Id_type_partner)
		  INNER JOIN partners partners1 ON (partners.id_partner = partners1.id)
          INNER JOIN partners_pay_system ON (partners.id_rang = partners_pay_system.id)
          INNER JOIN users_partner ON (partners.id = users_partner.id_partner)
		    INNER JOIN users ON (users_partner.id_user = users.id)
			  
		group by
          `id`
        ORDER BY
		  `id` DESC
		LIMIT ?,?
		';
	$rezult      = $db_gb->select($query,$page_now,$step);

	$rows_total  = $db_gb->queryInfo['num_rows'];



?>
<script>
function edit_row(id){
	
			$('#boxes').load('content/catalogs/pages/modalfiles/partners/edit.php',
				{
					'id':id
				});
			make_mask();
	};
function remove_row(id){
	
			$('#table_execut').load('content/catalogs/pages/modalfiles/partners/edit_end.php',{
					'id':id,
					'type_oper':"3"
				});
		
	};
		
		
$('a[name=more_]').attr('id',<? if($rows_total>=10)echo $page_now+$step; else echo -1; ?>);
</script>

<? 
if($rezult)
{
	foreach($rezult as $rezult)
	{
		
?>
<script>
//alert($("#table_1_").closest('tr').html());	
		
//$('<tr><td>1</td><td>2</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');;

		$('<tr><td><? echo $rezult['id'];?></td><td><? echo $rezult['name'];?>	</td><td><? echo $rezult['type_part'];?></td><td><? echo $rezult['him_part'];?></td><td><? echo $rezult['name_partner'];?></td><td><? if($rezult['sex']=="m") echo '<img src="../img/ico/'.$rezult["link_pic_man"].'" width="32px">'; else echo '<img src="../img/ico/'.$rezult["link_pic_man"].'" width="32px">';?></td><td> <? if( $rezult['dinamic'] == '1') echo '<img src="../img/tick.png" width="16px">'; else echo '<img src="../img/no.png" width="16px">'; ?></td><td><? echo $rezult['proc'];?></td><td><? if( $rezult['work'] == 'y') echo '<img src="../img/tick.png" width="16px">'; else echo '<img src="../img/no.png" width="16px">'; ?></td><td><? echo $rezult['comment'];?></td><td><a  href = "#dialog1" onclick="edit_row(\'<? echo $rezult['id'];?>\');" name="<? echo $rezult['id'];?>" class="button_edit"></a></td><td><a class = "button_remove" href="#" onclick="remove_row(\'<? echo $rezult['id'];?>\');"  ></a></td></tr>').insertAfter($("#table_1_ tr:last"));

		//});

</script>
<?	
	}
}
?>

