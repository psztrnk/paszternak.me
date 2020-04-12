<?php snippet('header') ?>

<?php $months = site()->page('notes')->children()->sortBy('dirname', 'asc')->paginate(1); $pagination = $months->pagination();?>

<?php foreach ($months as $month): ?>
	<?php $posts = $month->children()->sortBy('dirname', 'desc'); ?>
	<?php foreach ($posts as $post): ?>
		<article>
			<?php if($post->showtitle() && $post->showtitle() == 'show' || $post->showtitle() == '') { ?>
				<h2><?php echo $post->title()->html(); ?></h2>
			<?php } ?>
			<?php echo $post->text()->kirbytext(); ?>
			<p class="meta">&rarr; <a href="<?php echo $post->url(); ?>" title="permalink"><?php echo $post->date()->toDate('H:i Y-m-d'); ?></a></p>
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
