<div class="container">
  <h2><?php echo $title; ?></h2>

	<?php echo validation_errors(); ?>

	<?php echo form_open('employee/add'); ?>

    <label for="name">First Name</label>
    <input type="input" name="name" /><br/>
	<label for="lName">Last Name</label>
    <input type="input" name="lName"/><br/>
	<label for="email">Email</label>
    <input type="input" name="email" /><br/>
    <input type="submit" name="submit" value="Add Employees item" />

</form>
</div>


    