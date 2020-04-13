<?php snippet('header') ?>

	<article>
		<?php
			if($page->showtitle() && $page->showtitle() == 'show' || $page->showtitle() == '') {
				echo '<h2>'.$page->title()->html().'</h2>';
			}
			echo $page->text()->kirbytext();
		?>
	</article>

<?php snippet('footer') ?>
