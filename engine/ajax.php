<?php 
	# Подключаем конфигурацию
	include('config.php');

	# Перенаправление на пользовательскую функцию
	if (isset($_POST['action']) && $_POST['action']!==''){
		$action = $_POST['action'];
		$result = $action();
		echo(json_encode($result));
	}

	function recall(){
		$phone = $_POST['phone'];
		$name = $_POST['name'];
		$mailto = 'stdorog@mail.ru';
		$subject = 'Обратный звонок asfalt-stroy-dor.ru';
		$message = 'Телефон: '.$phone.' Имя: '.$name;
		if (sendMail($mailto, $subject, $message)){
			$result['success'] = 'sendMail';
		} else if (mail($mailto, $subject, $message)){
			$result['success'] = 'mail';
		} else {
			$result['error'] = 'recall';
		}
		return $result;
	}

?>