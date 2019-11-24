<!DOCTYPE HTML>
<html lang="pl">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo config('site_name'); ?></title>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://bootswatch.com/3/<?php echo strtolower(config('back_theme')); ?>/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/pepper-grinder/jquery-ui.css">
		<style>
			footer.navbar.navbar-default
			{
				position: fixed;
				bottom: 0;
				margin-bottom: 0;
				width: 100%;
			}
			.copyrightTwo
			{
				padding-top: 15px;
			}
		</style>
	</head>

	<body>

		
		<nav class="navbar navbar-inverse">
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
					<?php if($loggedin == TRUE): ?>
					<ul class="nav navbar-nav">
						<li><?php echo anchor('admin/panel','Panel Admina'); ?></li>
						<li><?php echo anchor('admin/config','Opcje konfiguracji');?></li>
						<li><?php echo anchor('admin/users/user_list','Użytkownicy');?></li>
						<li><?php echo anchor('admin/blog/article_list','Artykuły bloga');?></li>
						<li><?php echo anchor('admin/gallery','Galeria');?></li>
						<li><?php echo anchor('admin/comments/comments_list','Komentarze');?></li>
						<li><?php echo anchor('admin/pages/page_list','Strony');?></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
			     		<li><?php echo anchor('admin/panel/logout', 'Wyloguj się', 'class="navbar-link"'); ?></li>
			    	</ul>
			    	<?php endif; ?>
				</div>
			</div>
	</nav>