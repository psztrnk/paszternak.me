<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?= $site->description() ?>">
		<link href="<?= $page->url() ?>" rel="canonical">
		<link rel="alternate" type="application/json" title="Paszternak.me Feed" href="<?= $site->page('feed')->url(); ?>" />
		<title><?= $site->title() ?> | <?= $page->title() ?></title>
		<?= css(['assets/css/reset.css', '@auto']) ?>
		<?= css(['assets/css/hastings.css', '@auto']) ?>
	</head>
	<body>
		<header>
			<a href="<?= $site->url(); ?>"><img src="<?= $site->page('home')->file('adam.png')->url(); ?>" /></a>
			<h1><?= $site->title()->html(); ?></h1>
			<span><?php snippet('menu') ?></span>
			<?php if ($page->slug() == 'micro') { echo $page->text()->kirbytext(); } ?>
		</header>
		<div class="content">
