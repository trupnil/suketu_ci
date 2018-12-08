<h2>Registration</h2>


<form method="post" action="<?php echo base_url() ?>Admin/insert">

<label>fname</label>
<input type="text" name="fname">

<label>lname</label>
<input type="text" name="lname"> 
<label> password </label>
<input type="password" name="password" >
<label>city</label>
<select name="city"> 
	<option><--select city--> </option>
<?php foreach ($city as $key => $value) { ?>

	<option value="<?php echo $value->city_id; ?>"> <?php echo $value->city_name; ?>  </option>
	
<?php  } ?>


 </select>




<input type="submit" name="submit" value="submit">

</form>