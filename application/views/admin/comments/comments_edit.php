<?php include APPPATH . 'views/admin/include/header.php'; ?>

<div class="container">
	<div class="page-header">
		<h1 class="text-center">Edytuj komentarz</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<?php if( !empty(validation_errors()) ): ?>
			<div class="alert alert-warning">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('', 'class="form-horizontal"'); ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Autor</label>
			<div class="col-sm-4">
				<span class="form-control"><?php echo $comment->name; ?></span>
			</div>	
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Treść</label>
			<div class="col-sm-4">
				<?php echo form_textarea('content', set_value('content', $comment->content), 'class="form-control"'); ?>
			</div>	
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-2">
				<?php echo form_submit('submit', 'Zapisz zmiany', 'class="btn btn-primary"'); ?>
				<?php echo anchor('admin/comments/comments_list','Powrót','class="btn btn-default"'); ?>
			</div>
		</div>
		<?php echo form_close(); ?>	
		</div>
	</div>
</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>