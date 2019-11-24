<?php include APPPATH . 'views/admin/include/header.php'; ?>

	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Tworzenie artykułu</h1>
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
						<label class="col-sm-2 control-label">Tytuł</label>
						<div class="col-sm-4">
							<?php echo form_input('title', '', 'class="form-control"'); ?>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alias</label>
						<div class="col-sm-4">
							<?php echo form_input('alias', '', 'class="form-control"'); ?>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Data</label>
						<div class="col-sm-4">
							<?php echo form_input('date', date('Y-m-d'), 'id="datepicker" class="form-control"'); ?>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Treść</label>
						<div class="col-sm-8">
							<?php echo form_textarea('content', '', 'id="ckeditor" class="form-control"'); ?>
						</div>	
					</div>
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<?php echo form_submit('submit', 'Dodaj artykuł', 'class="btn btn-primary"'); ?>
							<?php echo anchor('admin/blog/article_list','Powrót','class="btn btn-default"'); ?>
						</div>
					</div>
				<?php echo form_close(); ?>		
			</div>
		</div>
	</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>