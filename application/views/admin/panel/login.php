<?php include APPPATH . 'views/admin/include/header.php'; ?>

<div class="container">
	<div class="page-header">
		<h1 class="text-center">Panel Administracyjny - Logowanie</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="modal-dialog text-center">
				<div class="modal-content">
					<div class="modal-body">
						<?php if( !empty(validation_errors()) ): ?>
							<div class="alert alert-warning">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo form_open('', 'class="form-inline"'); ?>
			  				<p>Podaj swoje dane do logowania:</p>
				  			<div class="form-group">
				    			<?php echo form_input('email', '', 'class="form-control" placeholder="Adres Email"'); ?>
				  			</div>
				  			<div class="form-group">
				    			<?php echo form_password('password', '', ' class="form-control" placeholder="Hasło"'); ?>
				  			</div>
				  			<div class="form-group">
				    			<?php echo form_submit('submit', 'Zaloguj się', 'class="btn btn-primary"'); ?>
				  			</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>