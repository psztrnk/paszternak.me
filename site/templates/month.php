<?php snippet('header') ?>

		<?php $posts = $page->children()->sortBy('dirname', 'desc'); ?>
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

<?php snippet('footer') ?>
