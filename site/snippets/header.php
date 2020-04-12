<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?= $site->description() ?>">
		<link href="<?= $page->url() ?>" rel="canonical">
		<title><?= $site->title() ?> | <?= $page->title() ?></title>
		<?= css(['assets/css/reset.css', '@auto']) ?>
		<?= css(['assets/css/hastings.css', '@auto']) ?>
	</head>
	<body>
		<header>
			<a href="<?php echo $site->url(); ?>"><img src="<?php echo $site->page('home')->file('adam.png')->url(); ?>" /></a>
			<h1><?php echo $site->title()->html(); ?></h1>
			<span><?php snippet('menu') ?></span>
			<?php if ($page->slug() == 'micro') { ?>
				<?php echo $page->text()->kirbytext(); ?>
			<?php } ?>
		</header>
		<div class="content">
