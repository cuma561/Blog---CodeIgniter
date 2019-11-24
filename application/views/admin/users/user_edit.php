<?php include APPPATH . 'views/admin/include/header.php'; ?>

<div class="container">
	<div class="page-header">
		<h1 class="text-center">Edycja użytkownika</h1>
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
					<label class="col-sm-2 control-label">Imię</label>
					<div class="col-sm-4">
						<?php echo form_input('name', set_value('name', $user->name), 'class="form-control"'); ?>
					</div>	
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<?php echo form_input('email', set_value('email', $user->email), 'class="form-control"'); ?>
					</div>	
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Hasło</label>
					<div class="col-sm-4">
						<?php echo form_password('password', '', 'class="form-control"'); ?>
					</div>	
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Potwierdź hasło</label>
					<div class="col-sm-4">
						<?php echo form_password('passconf', '', 'class="form-control"'); ?>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-2">
						<?php echo form_submit('submit', 'Zapisz zmiany', 'class="btn btn-primary"'); ?>
						<?php echo anchor('admin/users/user_list','Powrót','class="btn btn-default"'); ?>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>