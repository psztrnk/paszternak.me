<?php snippet('header') ?>

	<article>
		<?php if($page->showtitle() && $page->showtitle() == 'show' || $page->showtitle() == '') { ?>
			<h2><?php echo $page->title()->html(); ?></h2>
		<?php } ?>
		<?php echo $page->text()->kirbytext(); ?>
	</article>

<?php snippet('footer') ?>
