<?php snippet('header') ?>

	<article>
			<h2><?php echo $page->title()->html(); ?></h2>
			<p>
				Built with <a href="https://getkirby.com">Kirby</a> <?= $kirby->version(); ?> and ♥.<br />
				Site version: <?= $site->version(); ?>.<br />
				Number of posts on this site: <?= $site->page('notes')->grandChildren()->published()->count(); ?> &ndash; and counting.<br />
				Last updated: <?php $last = $site->page('notes')->grandChildren()->sortBy('date', 'desc')->limit(1); foreach ($last as $l) { echo '<a href="'.$l->url().'">'.$l->date()->toDate('Y-m-d, H:i').'</a>.'; } ?>
			</p>
			<?php echo $site->description()->kirbytext(); ?>
			<?php echo $page->text()->kirbytext(); ?>
			<?php echo $site->contact()->kirbytext(); ?>
	</article>

<?php snippet('footer') ?>
