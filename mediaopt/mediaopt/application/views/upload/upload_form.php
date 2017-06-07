 <div class="container">
  <h2><?php echo $title; ?></h2>
  <?php if(isset($error))echo $error;?>
 <?php echo form_open_multipart('upload/do_upload'); ?>
 <label class="control-label">Select File</label>
 <input type="file" name="userfile" size="20"  name="fileToUpload"  style="display: initial;" data-show-preview="false">
  <input class="btn btn-success" type="submit"   value="Upload" />
 </form>
</div>