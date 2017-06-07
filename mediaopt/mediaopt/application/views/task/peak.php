<div class="container"> 
  <h4>Find the peak time of work performed on a single day and a single project.</h4>  
  <div class="alert alert-danger fade in alert-dismissable" style="width: 400px;padding-top: 0px !important; padding-bottom: 0px !important; border-bottom-width: 0px !important; border-top-width: 0px !important;">
		<?php echo validation_errors(); ?>
	</div>  
	 <?php echo form_open('task/peak'); ?>
	 <table class="table table-hover">
	 <tbody>
	 <tr>
		<td>
	 <label  >Projects:</label>
			<select name="project"  class="form-control " >
				<option value="">----</option> 
				<?php foreach ($projects as $projects_item): ?>
				<option value="<?=$projects_item['ID']?>"><?=$projects_item['name']?></option>
				 <?php endforeach; ?>
			</select>	
		 
		<input type="hidden" name="id_project" value="" id="project">	
			<script type="text/javascript">				 
								    
			</script> 
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

					$( "select[name=project]" ).change(function () {  			
					  $("#project"	).val($(this).val());
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
			  <td><br>
		 <input class="btn btn-success" type="submit" name="submit" value="calculate" />
		 </td>
			</tr>
			</tbody>
			</table>

		<?if (isset ($timeRanges)){?>
		<div>The peak time for the <?=$project['name']?> on the <?=$date?>   From <?=$timeRanges['start_time']?> to <?=$timeRanges['end_time']?>  </div>
			<h6> the count of employees was working on the project is <?=$timeRanges['counts']?></h6>			 
		<?}?>		
</div>
	

    