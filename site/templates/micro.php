<?php snippet('header') ?>

<?php $items = $page->children()->sortBy('date', 'desc')->paginate(5); $pagination = $items->pagination(); ?>
<?php foreach ($items as $item): ?>
	<article>
		<?php if ($item->source() == 'friendica_pic' || $item->source() == 'pixelfed') {
				echo '<img src="'.$item->pic().'" />';
		} ?>
		<?= $item->text(); ?>
		<p class="meta">&rarr; <a href="<?= $item->link() ?>" title="permalink"><?php echo $item->date()->toDate('H:i Y-m-d'); ?></a></p>
	</article>
<?php endforeach; ?>

<?php if ($pagination->hasPages()): ?>
	<nav class="pagination">
  		<?php if ($pagination->hasPrevPage()): ?>
  			<a class="prev" href="<?= $pagination->prevPageURL() ?>">&rarr; next batch</a>
  		<?php endif ?>
		<?php if ($pagination->hasNextPage()): ?>
	  		<a class="next" href="<?= $pagination->nextPageURL() ?>">previous batch &larr;</a>
	  	<?php endif ?>
	</nav>
<?php endif ?>

<?php snippet('footer') ?>
