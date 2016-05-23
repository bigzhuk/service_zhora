<?php
class App {
	const COMPANY_NAME = 'Супер-Сервис';
	const DEFAULT_TITLE = 'Атосервис г. Пушкино';

	public static $phones = [
		'+7(909)999-39-90', '+7(906)626-51-45'
	];
	public static  $services = [
		'car_repair' => 'Кузовной ремонт',
		'engine_repair' => 'Ремонт двигателя',
		'gear_repair' =>  'Ремонт АКПП и МКПП',
		'electrics_repair' => 'Ремонт электрики',
		'tyres_service' => 'Шиномонтаж',
		'to_contracts' => 'Договора на ТО',
	];
	public static  $pages = [
		'/about' => 'О компании',
		'/contacts' => 'Контакты',
		'/price_list' => 'Цены',
		'/service' => 'Услуги',
		'/service/car_repair' => 'Кузовной ремонт',
		'/service/engine_repair' => 'Ремонт двигателя',
		'/service/gear_repair' => 'Ремонт АКПП и МКПП',
		'/service/electrics_repair' => 'Ремонт электрики',
		'/service/tyres_service' => 'Шиномонтаж',
		'/service/to_contracts' => 'Договора на ТО',

	];

	public static function getPageTitle() {
		$current_page = $_SERVER['REQUEST_URI'];
		if(!empty(self::$pages[$current_page])) {
			return self::$pages[$current_page];
		}
		return 'Атосервис г. Пушкино';
	}

}
?>
<?php include('engine/ajax.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<script>console.groupCollapsed('Загрузка');</script>
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<meta charset="UTF-8">
	<title><?= App::getPageTitle(); ?></title>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<script src="js/script.js"></script>

	<link rel="stylesheet/less" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/style/style.less?q='.rand(1, 9999);?>">
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
	<script src="js/script.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,700,700italic,300italic,300&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
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

