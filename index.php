<?php include('engine/app.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<script>console.groupCollapsed('Загрузка');</script>
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet/less" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/style/style.less?q='.rand(1, 9999);?>">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,700,700italic,300italic,300&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
	
	<meta charset="UTF-8">
	<title><?= App::getPageInfo('title');?></title>
	<meta name="description" content="<?= App::getPageInfo('description');?>" />
	<meta name="keywords" content="<?= App::getPageInfo('keywords');?>" />
	<meta name="title" content="<?= App::getPageInfo('title');?>" />

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="js/script.js"></script>


</head>
<body>

	<div id="background"></div>
	<div id="wrapper">
		<div id="mask" onclick="hidePopup();"></div>
		<?php include('static/header.php'); ?>
		<div id="content">
			<?php include('engine/redirect.php'); ?>
		</div>
		<div id="wrapper_push"></div>
	</div>

	<?php include('static/footer.php'); ?>



</body>
</html>

<script>
	console.groupEnd();
</script>

