<div class="container">
  <h2><?php echo $title; ?></h2>

	<?php echo validation_errors(); ?>

	<?php echo form_open('employee/edit/'.$employees_item['ID']); ?>

   <table>
        <tr>
            <td><label for="name">First Name</label></td>
            <td><input type="input" name="name" size="50" value="<?php echo $employees_item['name'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="lName">Last Name</label></td>
            <td><input type="input" name="lName" size="50" value="<?php echo $employees_item['lName'] ?>" /></td>
        </tr>
		<tr>
            <td><label for="email">Email</label></td>
            <td><input type="input" name="email" size="50" value="<?php echo $employees_item['email'] ?>" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Edit employees item" /></td>
        </tr>
    </table>
</form>
</div>
 
 
 
  