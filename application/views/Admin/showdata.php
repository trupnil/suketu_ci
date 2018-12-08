<table border="1">

<tR>
	<th>Id</tH>
		<th>fname</tH>
			<th>lname</tH>
				<th>password</tH>
					<th>city</tH>
					<tH colspan="2"> Action </tH>

					
</tR>


<?php

foreach ($reg_data as $key => $value) { ?>
	
	<tr>
		<td> <?php  echo $value->id; ?> </td>
		<td> <?php  echo $value->fname; ?> </td>
		<td> <?php  echo $value->lname; ?> </td>
		<td> <?php  echo $value->password; ?> </td>
			<td> <?php  echo $value->city_name; ?> </td>
	    <td><a href="<?php echo base_url() ?>Admin/delete/<?php  echo  base64_encode($value->id); ?>"> Delete </a> </td>

	      <td><a href="<?php echo base_url() ?>Admin/Edit/<?php  echo  base64_encode($value->id); ?>"> Edit </a> </td>
	</tR>



	<?php }



 ?>


</table>