<!DOCTYPE HTML>
<html lang="pl">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo config('site_name'); ?></title>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://bootswatch.com/3/<?php echo strtolower(config('front_theme')); ?>/bootstrap.min.css">
		<style>
			footer.navbar.navbar-inverse
			{
				position: fixed;
				bottom: 0;
				margin-bottom: 0;
				width: 100%;
				border-radius: 0;
			}
			.copyright
			{
				color: #999999;
				padding-top: 15px;
			}
		</style>

	</head>

	<body>

		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toogle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php echo anchor(site_url(), config('site_name'), 'class="navbar-brand"'); ?>

				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><?php echo anchor(site_url(). 'blog', 'Blog'); ?></li>
						<li><?php echo anchor(base_url() . 'gallery', 'Galeria'); ?></li>

						<?php if (!empty($pages)): ?>
							<?php foreach($pages as $row): ?>
								<li><?php echo anchor('page/' . $row->alias, $row->title); ?></li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
			     		<li><a href="<?php echo base_url() . 'admin'; ?>">Panel Admina</a></li>
			    	</ul>
				</div>
			</div>
		</nav>