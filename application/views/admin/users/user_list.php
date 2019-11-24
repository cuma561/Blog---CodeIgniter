<?php include APPPATH . 'views/admin/include/header.php'; ?>



<div class="container">
	<div class="page-header">
		<h1 class="text-center">Lista użytkowników</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo anchor('admin/users/create', '<span class="glyphicon glyphicon-plus"></span> Utwórz użytkownika', 'class="btn btn-primary"'); ?>
			<p>&nbsp;</p>
			<?php if(!empty($users)): ?>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Imię</th>
							<th>Email</th>
							<th class="text-center">Edytuj</th>
							<th class="text-center">Usuń</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $row): ?>
							<tr>
								<td><?php echo ($row->id); ?></td>
								<td><?php echo ($row->name); ?></td>
								<td><?php echo ($row->email); ?></td>
								<td class="text-center"><?php echo anchor('admin/users/edit/' . $row->id, '<span class="glyphicon glyphicon-edit"></span>', 'class="btn btn-warning"'); ?></td>
								<td class="text-center"><?php echo anchor('admin/users/delete/' . $row->id, '<span class="glyphicon glyphicon-remove"></span>', array('onclick' => "return confirm('Czy napewno chcesz usunąć?');", 'class' => 'btn btn-danger')); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php else: ?>
				<h2>Brak użytkowników</h2>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>