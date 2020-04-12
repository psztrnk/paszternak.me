<?php snippet('header') ?>

		<?php $posts = $page->children()->sortBy('dirname', 'desc'); ?>
		<?php foreach ($posts as $post): ?>
			<article>
				<?php if($post->showtitle() && $post->showtitle() == 'show' || $post->showtitle() == '') { ?>
					<h2><?php echo $post->title()->html(); ?></h2>
				<?php } ?>
				<?php echo $post->text()->kirbytext(); ?>
				<p class="meta">&rarr; <a href="<?php echo $post->url(); ?>" title="permalink"><?php echo $post->date()->toDate('H:i Y-m-d'); ?></a></p>
			</article>
		<?php endforeach; ?>

<?php snippet('footer') ?>
