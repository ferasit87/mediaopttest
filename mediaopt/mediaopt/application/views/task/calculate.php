<div class="container"> 
  <h4>Calculate the number of hours that were tracked on that project.</h4>  
  <div class="alert alert-danger fade in alert-dismissable" style="width: 400px;padding-top: 0px !important; padding-bottom: 0px !important; border-bottom-width: 0px !important; border-top-width: 0px !important;">
		<?php echo validation_errors(); ?>
	</div>  
	 <?php echo form_open('task/calculate'); ?>
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
				$(function(){

					$( "select[name=project]" ).change(function () {  			
					  $("#project"	).val($(this).val());
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

		<?if (isset ($billing) ){?>
		<div>The time spended on the <?=$project['name']?> = <?=$billing?></div>
		<?}?>
		
</div>
	

    