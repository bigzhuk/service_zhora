<?php 

	// $_SERVER['REQUEST_URI'] = str_replace('/asfaltkroshka', '', $_SERVER['REQUEST_URI']);

	$redirect = '';
	if (isset($_SERVER['REQUEST_URI'])){
		$redirect_ = explode('/', $_SERVER['REQUEST_URI']);
		foreach ($redirect_ as $key => $value) {
			if ($value !== ''){
				$redirect .= '/'.$value;
			}
		}
	}

	if ($redirect !== ''){
		if (file_exists('pages'.$redirect.'.php')){
			include 'pages'.$redirect.'.php';
		} else if (file_exists('pages'.$redirect.'/index.php')){
			include 'pages'.$redirect.'/index.php';
		} else {
			include 'pages/error404.php';
		}
	} else {
		include 'pages/service.php';
	}
	
?>