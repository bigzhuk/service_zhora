<h1>Контакты</h1>

<div class="container">
	<div align="center">
		<table id="contacts_table">
			<tr>
				<td>График работы:</td><td>8:00 до 23:00, без выходных</td>
			</tr>
			<tr>
				<td>Телефон:</td><td><?= App::$phones[0].', '.App::$phones[1];?></td>
			</tr>
			<tr>
				<td>Адрес:</td><td>141207, МО, г. Пушкино, ул. Лермонтова, 37-а («Росгеология»)</td>
			</tr>
			<tr>
				<td>Электронная почта:</td><td><?= App::COMPANY_EMAIL?></td>
			</tr>
			<tr>
				<td>Группа в VK:</td><td><a href="https://vk.com/public131730975" target="_blank">https://vk.com/public131730975</a></td>
			</tr>
			<tr>
				<td>Реквизиты:</td><td></td>
			</tr>
		</table>
		<br/>
		<h2>Схема проезда</h2>
		<div id="map_2" style="width: 800px; height: 720px;">
			<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=OklSB4HEyZ5MTFykxA-WsjzVpfvKg6S0&width=800&height=720&lang=ru_RU&sourceType=constructor"></script>
		</div>
	</div>
</div>