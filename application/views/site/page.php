<?php include APPPATH . 'views/site/include/header.php'; ?>

<div class="container">
	<div class="page-header">
		<h1 class="text-center"><?php echo $page->title; ?></h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $page->content; ?>
		</div>
	</div>
</div>

<?php include APPPATH . 'views/site/include/footer.php'; ?>