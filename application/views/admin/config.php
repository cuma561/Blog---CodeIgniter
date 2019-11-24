<?php include APPPATH . 'views/admin/include/header.php'; ?>

	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Opcje konfiguracji</h1>
		</div>
		<?php if( !empty(validation_errors()) ): ?>
			<div class="alert alert-warning">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('','class="form-horizontal"'); ?>
		<div class="form-group">
			<label class="col-sm-3 control-label">Nazwa strony</label>
			<div class="col-sm-4">
				<?php echo form_input('site_name', config('site_name'), 'class="form-control"'); ?>
			</div>	
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Szablon strony</label>
			<div class="col-sm-4">
				<select name="front_theme" class="form-control">
						<?php 
							$option = array(
								'Cerulean',
								'Cosmo',
								'Cyborg',
								'Default',
								'Flatly',
								'Journal',
								'Lumen',
								'Readable',
								'Simplex',
								'Slate',
								'Spacelab',
								'Superhero',
								'United',
								'Yeti',
							);
							foreach($option as $item)
							{
								if(config('front_theme') == $item)
								{
									echo '<option selected>' . $item . '</option>';
								}
								else
								{
									echo '<option>' . $item . '</option>';
								}
							}
						?>
				</select>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Szablon panelu Admina</label>
			<div class="col-sm-4">
					<select name="back_theme" class="form-control">
						<?php 
							$option = array(
								'Cerulean',
								'Cosmo',
								'Cyborg',
								'Default',
								'Flatly',
								'Journal',
								'Lumen',
								'Readable',
								'Simplex',
								'Slate',
								'Spacelab',
								'Superhero',
								'United',
								'Yeti',
							);
							foreach($option as $item)
							{
								if(config('back_theme') == $item)
								{
									echo '<option selected>' . $item . '</option>';
								}
								else
								{
									echo '<option>' . $item . '</option>';
								}
							}
						?>
					</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Ilość artykułów na stronie</label>
			<div class="col-sm-4">
					<?php echo form_input('num_posts', config('num_posts'), 'class="form-control"'); ?>
			</div>	
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Ilość kolumn w galerii</label>
			<div class="col-sm-4">
				<select name="num_gal" class="form-control">
						<?php 
							$option = array(1,2,3,4);
							foreach($option as $item)
							{
								if(config('num_gal') == $item)
								{
									echo '<option selected>' . $item . '</option>';
								}
								else
								{
									echo '<option>' . $item . '</option>';
								}
							}
						?>
					</select>
			</div>	
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-3">
				<?php echo form_submit('submit', 'Zapisz zmiany', 'class="btn btn-primary"'); ?>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>