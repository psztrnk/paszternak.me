<?php snippet('header') ?>

<?php $months = site()->page('notes')->children()->sortBy('dirname', 'asc');?>
<article>
	<h2><?= $page->title(); ?></h2>
	<ul>
		<?php foreach ($months as $month): ?>
			<li><?php echo '<a href="'.$month->url().'">'.$month->title().'</a> ('.$month->children()->published()->count().')';?></li>
		<?php endforeach; ?>
	</ul>
</article>

<?php snippet('footer') ?>
