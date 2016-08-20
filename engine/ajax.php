<?php
require_once('../classes/autoload.php');
	if ($_POST['action'] === 'recall') { // обратный звонок
		$result = recall();
		echo json_encode($result);
	}

	if ($_POST['action'] === 'otziv') {
		$result = addNewOtziv();
		if ($result === News\Controller\News::RESULT_SUCCESS) {
			$subject = 'Новый отзыв на сайте avtomotors-50.ru';
			$message = '<a href="http://service_zhora.dev/admin/otzivy.php">Радектировать отзывы</a>';
			App::sendMail($subject, $message);
		}
		echo json_encode($result);
	}


function recall() {
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	if (empty($phone)) {
		$result['error'] = 'recall';
		return $result;
	}

	$subject = 'Обратный звонок';
	$message = 'Обратный звонок от пользователя avtomotors-50.ru<br>
		Имя: '.$name.'<br>
		Тел.: '.$phone;
	App::sendMail($subject, $message);

	$result['success'] = 'mail';
	return $result;
}

function addNewOtziv() {
	$new_controller = new News\Controller\News(new \News\Model\News(), new \News\Decorator\News());
	return $new_controller->addOtzivByAjax();
}

?>