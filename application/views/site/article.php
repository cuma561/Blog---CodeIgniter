<?php include APPPATH . 'views/site/include/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h1 class="pull-left"><?php echo $article->title; ?></h1>
				<h4>
					<span class="label label-default pull-right" style="margin-top:25px;">
						<span class="glyphicon glyphicon-calendar"></span>
						<?php echo ($article->date); ?>
					</span>
				</h4>
				<div class="clearfix"></div>
				<?php echo $article->content; ?>
				<hr>
				<?php if(!empty($comments)): ?>
						<h3>Komentarze:</h3>
						<?php foreach($comments as $row): ?>
							<div class="panel panel-default">
				  				<div class="panel-heading">
				    				<h3 class="panel-title pull-left">
				    					<span class="glyphicon glyphicon-user"></span>
				    					<?php echo mailto($row->email, $row->name); ?>
				    				</h3>
				    				<span class="pull-right"><?php echo ($row->date); ?></span>
				    				<div class="clearfix"></div>
				  				</div>
				  				<div class="panel-body">
				    				<?php echo $row->content; ?>
				  				</div>
							</div>
						<?php endforeach; ?>
				<?php else: ?>
					<h3>Brak komentarzy</h3>
				<?php endif; ?>
				<?php echo validation_errors(); ?>
				<?php echo form_open(); ?>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Imię</label>
								<?php echo form_input('name', '', 'class="form-control" placeholder="Imię"'); ?>
							</div>
							<div class="form-group">
								<label>Email</label>
								<?php echo form_input('email', '', 'class="form-control" placeholder="Email"'); ?>
							</div>
							<div class="form-group">
								<label>Komentarz</label>
								<?php echo form_textarea('content', '', 'class="form-control" placeholder="Treść komentarza"'); ?>
							</div>
							<?php echo form_submit('submit', 'Dodaj komentarz', 'class="btn btn-primary"'); ?>
							<?php echo anchor('blog','Powrót','class="btn btn-default"'); ?>
							<?php echo form_hidden('article_id', $article->id); ?>
							<?php echo form_hidden('date', date('Y-m-d')); ?>
						</div>
					</div>
					<?php echo form_close(); ?>
				<p>&nbsp;</p>
			</div>
			<div class="col-sm-4">
				<?php include APPPATH . 'views/site/include/sidebar.php'; ?>
			</div>
		</div>
	</div>