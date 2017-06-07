<div class="container">
  <h2>All Tracking Employees</h2>
  <p>The table contains the information about all logs (in and out) for all employees on table rows:</p>  
	<div class="alert alert-danger fade in alert-dismissable" style="width: 400px;padding-top: 0px !important; padding-bottom: 0px !important; border-bottom-width: 0px !important; border-top-width: 0px !important;">
		<?php echo validation_errors(); ?>
	</div>  
	 <?php echo form_open('tracking/index'); ?>
	 <table class="table">  
	   <tbody>
		<td>
			<label  >Employees (select one):</label>
			<select name="employee"  class="form-control " >
				<option value="">----</option> 
				<?php foreach ($employees as $employees_item): ?>
				<option value="<?=$employees_item['ID']?>"><?=$employees_item['name']." ".$employees_item['lName']?></option>
				 <?php endforeach; ?>
			</select>	
		<input type="hidden" name="id_employee" value="" id="employee">			
		</td>
		<td>
			<label>Date</label>
			<div class='input-group date' id='datetimepicker'>
                <input type='text' name="date" class="form-control" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
			<script type="text/javascript">
			$(function(){

						$( "select" ).change(function () {  			
						  $("#employee"	).val($(this).val());
					   });
					});
				$(function() {              
				   // Bootstrap DateTimePicker v4
				   $('#datetimepicker').datetimepicker({
						 format: 'YYYY-MM-DD'
				   });
				});      
			</script>
		</td>
		<td>
		   <label for="start">Start time:</label><br>          
			<div class="input-group bootstrap-timepicker timepicker">
            <input id="timepicker0" name="start" type="text" class="form-control input-small">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			</div>
			<script type="text/javascript">
            $('#timepicker0').timepicker();
        </script>
		</td>
		<td>
		 <label for="end" style="margin-left:3em">End time:</label><br>
           <div class="input-group bootstrap-timepicker timepicker">
            <input id="timepicker1" name="end" type="text" class="form-control input-small">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			</div>
			<script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
		</td>
		 <td><br>
		 <input class="btn btn-success" type="submit" name="submit" value="Add Tracking item" />
		 </td>
          
		</tbody>
     </table>
       </form>  
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Employee Name</th>
        <th>Date</th>
        <th>Time in</th>
		<th>Time out</th>	 
		<th>-</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($trackings as $trackings_item): ?>
      <tr>
        <td><?=$trackings_item['employee']?></td>
        <td><?=$trackings_item['date']?></td>
        <td><?=$trackings_item['start_time']?></td>
        <td><?=$trackings_item['end_time']?></td>      
        <td><a class="btn btn-danger" href="<?=base_url(); ?>tracking/delete/<?=$trackings_item['ID']?>">delete</a></td>
      </tr> 
	  <?php endforeach; ?>
    </tbody>
  </table>
	   
	</div>
	

    