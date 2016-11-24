<div id="header">
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter40792069 = new Ya.Metrika({
						id:40792069,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
					});
				} catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/40792069" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	

	<div id="recall_form" class="popup">
		<input id="name" type="text" value="Имя"><br>
		<input id="phone" type="text" value="Телефон"><br>
		<input id="recall_btn" type="button" value="Отправить" onclick="recall();">
	</div>

	<div id="recall_success" class="popup">
		В ближейшее время вам перезвонят!
	</div>

	<div id="map" class="popup" style="width: 800px; margin-left: -400px; top: 10%;">
		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=OklSB4HEyZ5MTFykxA-WsjzVpfvKg6S0&width=800&height=720&lang=ru_RU&sourceType=constructor"></script>
	</div>
	
	<table id="header_top">
		<tbody>
			<tr>
				<td id="phones">
					<div style="color: white !important"><?=App::$phones[0]?></div>
					<div style="color: white !important"><?=App::$phones[1]?></div>
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
					<a class="mail_link" href="mailto:<?= App::COMPANY_EMAIL ?>"><?= App::COMPANY_EMAIL ?></a><br>
					<a onclick="showMap();">г. Пушкино, ул. Лермонтова, 37-а</a>
				</td>
			</tr>
		</tbody>
	</table>

	<div id="header_bottom">


		<div id="main_menu">	
			
				<div class="menu_section">
					<a class="main_menu_link" style="width: 200px;" href="/service">Услуги</a>
					<?php
					if (!App::isMainPage()) {
						echo '
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/car_repair"><span style="padding-left:15px">Кузовной ремонт<span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/engine_repair"><span style="padding-left:15px">Ремонт двигателя</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/gear_repair"><span style="padding-left:15px">Ремонт КПП</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/electrics_repair"><span style="padding-left:15px">Ремонт электрики</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/tyres_service"><span style="padding-left:15px">Шиномонтаж</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/evacuator"><span style="padding-left:15px">Эвакуатор</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/diagnostics"><span style="padding-left:15px">Диагностика</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/suspension"><span style="padding-left:15px">Ремонт подвески</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/to"><span style="padding-left:15px">Техобслуживание</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/insurance"><span style="padding-left:15px">Автострахование</span></a>
						<a class="sub_menu_link" style="display: none; text-align: left; font-size: 20px;" href="/service/truck_repair"><span style="padding-left:15px">Ремонт грузовиков</span></a>
						';
					} ?>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/about">О компании</a>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/price_list">Цены</a>
				</div>

				<div class="menu_section">
					<a class="main_menu_link" href="/contacts">Контакты</a>
				</div>
				<div class="menu_section">
					<a class="main_menu_link" href="/otzivy">Отзывы</a>
				</div>
				<div class="menu_section">
					<a class="main_menu_link" href="/vacansy">Вакансии</a>
				</div>	
		</div>
		
	</div>


</div>

<script>
	$(document).ready(function() {
		$('#phone').mask('8 (999) 999-9999',{placeholder:"×"});
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

		$('#recall_btn').prop('disabled', 'disabled');
		$.ajax({
			url: 'engine/ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {action: 'recall', phone: phone, name: name},
		})
		.done(function(data) {
			$('#recall_btn').prop('disabled', false);
			$('#recall_form').fadeOut(500);
			$('#recall_success').fadeIn(500);
			setInterval(function(){
				hidePopup();
			}, 3000);
		});
	}
</script>