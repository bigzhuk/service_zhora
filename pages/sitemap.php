<h1>Карта сайта</h1>

<div class="container">
	<?php
		$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/sitemap.xml');
		$domain = 'http://'.$_SERVER['HTTP_HOST'];
		if ($domain == 'http://service_zhora.dev') {
			$domain = 'http://avtomotors-50.ru';
		}

		$pages = [];
		foreach ($xml as $xml_item) {
			$page_url = str_replace($domain, '', $xml_item->loc );
			if (!empty(App::$pages[$page_url]['title'])) {
				if (false !== strpos($page_url, '/service/')) {
					$pages['service'][(string)$xml_item->loc] = App::$pages[$page_url]['title'];
				} else {
					$pages['main'][(string)$xml_item->loc] = App::$pages[$page_url]['title'];
				}
			}
		}

	?>
	<ul>
		<?php
			foreach ($pages['main'] as $url => $title) {
				echo '<li><a href = "' . $url . '">' . $title . '</a></li>';
				if ($url == 'http://avtomotors-50.ru/service') {
					echo '<ul>';
					foreach ($pages['service'] as $serv_url => $serv_title) {
						echo '<li><a href = "' . $serv_url . '">' . $serv_title . '</a></li>';
					}
					echo '</ul>';
				}
			}
		?>
	</ul>
</div>