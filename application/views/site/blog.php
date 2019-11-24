<?php include APPPATH . 'views/site/include/header.php'; ?>


	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Artykuły Bloga</h1>
		</div>
		<div class="col-sm-12">
			<?php if(!empty($blog)): ?>
				<?php foreach($blog as $row): ?>
					<h1 class="pull-left"><?php echo anchor('article/' . $row->alias, $row->title); ?></h1>
					<h4>
						<span class="label label-default pull-right" style="margin-top:25px;">
							<span class="glyphicon glyphicon-calendar"></span>
							<?php echo ($row->date); ?>
						</span>
					</h4>
					<div class="clearfix"></div>
					<p class="lead">
						<?php echo excerpt(($row->content), 20); ?>
					</p>
				<?php endforeach; ?>
				<?php else: ?>
					<h2>Brak artykułów</h2>
				<?php endif; ?>
				<div class="text-center">
					<?php echo $pagination; ?>
				</div>
		</div>
	</div>

	
	

<?php include APPPATH . 'views/site/include/footer.php'; ?>