<?php include APPPATH . 'views/admin/include/header.php'; ?>

<div class="container">
	<div class="page-header">
		<h1 class="text-center">Galeria</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo form_open_multipart('admin/gallery'); ?>
			<?php echo form_upload('userfile'); ?>
			<br>
				<input type="submit" name="upload" class="btn btn-primary" value="Załaduj zdjęcie" />
			<br><br />
			<?php echo form_close(); ?>
			<?php
				switch(config('num_gal'))
				{
					case 1:
						$col = 12;
						break;
					case 2:
						$col = 6;
						break;
					case 3:
						$col = 4;
						break;
					case 4:
						$col = 3;
						break;
				} 
			?>
			<?php foreach($files as $file): ?>
				<div style="position:relative;">
					<div class="col-sm-<?php echo $col; ?>" style="margin-bottom: 25px;">
						<a href="<?php echo base_url() . 'images/' . $file; ?>">
							<img class="img-thumbnail" src="<?php echo base_url() . 'images/thumbs/' . $file; ?>" alt="">
						</a>
						<?php echo form_open('admin/gallery/del_image'); ?>
							<?php echo form_hidden('file_name', $file); ?>
								<button type="submit" name="button" class="btn btn-sm btn-warning" style="position:absolute; top:10px;right:25px;">
									<span class="glyphicon glyphicon-remove"></span>
								</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>