<div id="header">

	<div id="recall_form" class="popup">
		<input id="name" type="text" value="Имя"><br>
		<input id="phone" type="text" value="Телефон"><br>
		<input id="recall_btn" type="button" value="Отправить" onclick="recall();">
	</div>

	<div id="recall_success" class="popup">
		В ближейшее время вам перезвонят!
	</div>

	<div id="map" class="popup" style="width: 800px; margin-left: -400px; top: 10%;">
		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Ng86sVakWqm2peB6kiAyGdSzUe0-NVUA&width=800&height=720&lang=ru_RU&sourceType=constructor"></script>
	</div>
	
	<table id="header_top">
		<tbody>
			<tr>
				<td id="phones">
					<div style="color: white !important">+7(495)409-48-78</div>
					<div style="color: white !important">+7(925)898-43-57</div>
					<a id="show_recall_btn" onclick="show_recall();">Обратный звонок</a>
					<!-- @TODO Указать время, когда принимаются звонки! Сделать форму - заказ обратного звонка. Как на dadget.ru. -->
					<!-- (Использовать inputmask для номера.) -->
				</td>
				<script language="JavaScript">
					function goHome() {
						location='http://'+window.location.host;
					}
				</script>
				<td><div id="logo" onclick="goHome();"></div></td>
				<td id="mails">
					stdorog@mail.ru<br>
					<a onclick="showMap();">г. Москва ул. Луганская д.4</a>
				</td>
			</tr>
		</tbody>
	</table>

	<div id="header_bottom">

		<div id="main_menu">	

			<center>

				<div class="menu_section">
					<a class="main_menu_link" href="/service">Услуги</a>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/about">О компании</a>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/price_list">Прайс-лист</a>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/photo">Галерея</a>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/technology">Технология</a>
				</div>

				<!-- <div class="menu_section">
					<a class="main_menu_link" href="work">Наши работы</a>
					<ul>
						<li><a class="main_menu_link" href="/work/asfaltirovanie">Lorem</a></li>
						<li><a class="main_menu_link" href="/work/blasgoustroistvo">Ipsum</a></li>
						<li><a class="main_menu_link" href="/work/zemlyanie_raboti">Dolor</a></li>
						<li><a class="main_menu_link" href="/work/arhitekturnie_formi">Sit amet</a></li>
					</ul>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/video">Видео</a>
				</div> -->

				<div class="menu_section">
					<a class="main_menu_link" href="/contacts">Контакты</a>
				</div>

			</center>
		
		</div>
		
	</div>


</div>

<script>
	$(document).ready(function() {
	});

	function hidePopup(){
		$('#mask,.popup').fadeOut(500);
	}

	function showMap(){
		$('#mask,#map').fadeIn(500);
	}

	function show_recall(){
		$('#mask,#recall_form').fadeIn(500);
	}

	function recall(){
		var phone = $('#phone').val();
		var name = $('#name').val();

		alert(phone);

		$('#recall_btn').prop('disabled', 'disabled');
		$.ajax({
			url: 'engine/ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {action: 'recall', phone: phone, name: name},
		})
		.done(function(data) {
			console.log(data);
			$('#recall_btn').prop('disabled', false);
			$('#recall_form').fadeOut(500);
			$('#recall_success').fadeIn(500);
			setInterval(function(){
				hidePopup();
			}, 3000);
		});
	}
</script>