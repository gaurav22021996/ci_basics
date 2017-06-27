<form method="post" action="<?php echo base_url();?>index.php/control/upload" enctype="multipart/form-data">
<?php // echo form_open_multipart("control/upload"); ?>

<input type="file" name="file" />

<input type="submit" value="upload" />

</form>

<form method="post" action="<?php echo base_url();?>index.php/control/validate">
	<?php echo validation_errors();?>
	<input type="text" name="name" />
	<input type="submit" value="submit" />
</form>