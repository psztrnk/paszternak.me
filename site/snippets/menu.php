<p><?php
	if ($page->slug() !== 'home') {
		echo '<a href="'.$site->url().'">main.page</a>&nbsp;&nbsp;&nbsp;';
	}
	if ($page->slug() !== 'about') {
		echo '<a href="'.$site->page('about')->url().'">about.this</a>&nbsp;&nbsp;&nbsp;';
	}
	if ($page->slug() !== 'micro') {
		echo '<a href="'.$site->page('micro')->url().'">micro.status</a>&nbsp;&nbsp;&nbsp;';
	}
	echo '<a href="'.$site->page('feed')->url().'">json.feed</a>';
?></p>
