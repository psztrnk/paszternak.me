<?php snippet('header') ?>

<?php $months = site()->page('notes')->children()->sortBy('dirname', 'asc')->paginate(1); $pagination = $months->pagination();?>

<?php foreach ($months as $month): ?>
	<?php $posts = $month->children()->sortBy('dirname', 'desc'); ?>
	<?php foreach ($posts as $post): ?>
		<article>
			<?php
				if($post->showtitle() && $post->showtitle() == 'show' || $post->showtitle() == '') {
					echo '<h2>'.$post->title()->html().'</h2>';
				}
				echo $post->text()->kirbytext();
			?>
			<p class="meta">&rarr; <a href="<?= $post->url(); ?>" title="permalink"><?= $post->date()->toDate('H:i Y-m-d'); ?></a></p>
		</article>
	<?php endforeach; ?>
<?php endforeach; ?>

<?php if ($pagination->hasPages()): ?>
	<nav class="pagination">
  		<?php if ($pagination->hasPrevPage()): ?>
  			<a class="prev" href="<?= $pagination->prevPageURL() ?>">&rarr; next month</a>
  		<?php endif ?>
		<?php if ($pagination->hasNextPage()): ?>
	  		<a class="next" href="<?= $pagination->nextPageURL() ?>">previous month &larr;</a>
	  	<?php endif ?>
	</nav>
<?php endif ?>

<?php snippet('footer') ?>
