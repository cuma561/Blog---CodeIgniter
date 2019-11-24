<?php include APPPATH . 'views/admin/include/header.php'; ?>

	
	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Lista artykułów</h1>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php echo anchor('admin/blog/create', '<span class="glyphicon glyphicon-plus"></span> Utwórz artykuł', 'class="btn btn-primary"'); ?>
				<p>&nbsp;</p>
				<?php if(!empty($blog)): ?>
					<div class="table-responsive">
						<table id="sortable" class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tytuł</th>
									<th>Alias</th>
									<th>Data</th>
									<th>Treść</th>
									<th>Odsłony</th>
									<th class="text-center">Edytuj</th>
									<th class="text-center">Usuń</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($blog as $row): ?>
									<tr>
										<td><?php echo ($row->id); ?></td>
										<td><?php echo ($row->title); ?></td>
										<td><?php echo ($row->alias); ?></td>
										<td><?php echo ($row->date); ?></td>
										<td><?php echo excerpt(($row->content), 10); ?> </td>
										<td><?php echo ($row->views); ?></td>
										<td class="text-center"><?php echo anchor('admin/blog/edit/' . $row->id, '<span class="glyphicon glyphicon-edit"></span>', 'class="btn btn-warning"'); ?></td>
										<td class="text-center"><?php echo anchor('admin/blog/delete/' . $row->id, '<span class="glyphicon glyphicon-remove"></span>', array('onclick' => "return confirm('Czy napewno chcesz usunąć?');", 'class' => 'btn btn-danger')); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<?php else: ?>
						</table>
					</div>
						<h2>Brak artykułów</h2>
					<?php endif; ?>
			</div>
		</div>
	</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>