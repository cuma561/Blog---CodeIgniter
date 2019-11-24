<?php include APPPATH . 'views/site/include/header.php'; ?>

<div class="container gallery">
	<div class="page-header">
		<h1 class="text-center">Galeria</h1>
	</div>
	<div class="row">
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
		<div class="col-sm-<?php echo $col; ?>">
			<a href="<?php echo base_url() . 'images/' . $file; ?>">
				<img class="img-thumbnail" src="<?php echo base_url() . 'images/thumbs/' . $file; ?>" alt="">
			</a>
		</div>
	<?php endforeach; ?>

	</div>
</div>

<?php include APPPATH . 'views/site/include/footer.php'; ?>