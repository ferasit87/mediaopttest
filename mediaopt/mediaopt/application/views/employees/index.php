<div class="container">
  <h2>All Employees</h2>
  <p>The table contains the information about the all employees on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
		<th>-</th>
		<th>-</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($employees as $employees_item): ?>
      <tr>
        <td><?=$employees_item['name']?></td>
        <td><?=$employees_item['lName']?></td>
        <td><?=$employees_item['email']?></td>
        <td><a class="btn btn-info" href="employee/edit/<?=$employees_item['ID']?>">edit</a></td>
        <td><a class="btn btn-danger" href="employee/delete/<?=$employees_item['ID']?>">delete</a></td>
      </tr> 
	  <?php endforeach; ?>
    </tbody>
  </table>
	<div><a class="btn btn-success"href="./employee/add">Add new Employee</a></div>
	</div>
	

    