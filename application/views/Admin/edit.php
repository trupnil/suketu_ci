<h2>Edit Here</h2>

 <?php  foreach ($edit_data as $key => $value) { ?>


 <form method="post" action="<?php echo base_url() ?>Admin/update/<?php echo base64_encode($value->id); ?>">



<label>fname</label>
<input type="text" name="fname" value="<?php echo $value->fname; ?>">

<label>lname</label>
<input type="text" name="lname"  value="<?php echo $value->lname; ?>">

<label>city</label>
<select name="city"> 

<?php  foreach ($city as $key => $cvalue) { ?>

<option  <?php if($cvalue->city_id == $value->city_fk) { echo "selected"; } ?> value="<?php echo $cvalue->city_id; ?>"> <?php echo $cvalue->city_name; ?> </option>
	
<?php } ?>
	 </select> 

<input type="submit" name="submit" value="Update">

</form>
 	
 <?php }  ?>

