<?php include APPPATH . 'views/admin/include/header.php'; ?>

	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Lista komentarzy</h1>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php if(!empty($comments)): ?>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>ID Artykułu</th>
									<th>Autor</th>
									<th>Data</th>
									<th>Treść</th>
									<th class="text-center">Edytuj</th>
									<th class="text-center">Usuń</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($comments as $row): ?>
								<tr>
									<td><?php echo ($row->id); ?></td>
									<td><?php echo ($row->article_id); ?></td>
									<td><?php echo mailto($row->email, $row->name); ?></td>
									<td><?php echo ($row->date); ?></td>
									<td><?php echo excerpt(($row->content), 10); ?> </td>
									<td class="text-center"><?php echo anchor('admin/comments/edit/' . $row->id, '<span class="glyphicon glyphicon-edit"></span>', 'class="btn btn-warning"'); ?></td>
									<td class="text-center"><?php echo anchor('admin/comments/delete/' . $row->id, '<span class="glyphicon glyphicon-remove"></span>', array('onclick' => "return confirm('Czy napewno chcesz usunąć?');", 'class' => 'btn btn-danger')); ?></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						<?php else: ?>
						</table>
					</div>
						<h2>Brak komentarzy</h2>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php include APPPATH . 'views/admin/include/footer.php'; ?>