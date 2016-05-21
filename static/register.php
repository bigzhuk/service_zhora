<style>
	
</style>

<div class="popup" style="display: none;" id="register_success">
	Поздравлямба, <span class="contact_name"></span>, вы успешно прошли регистрацию!!! <br>
	Ваша заявка будет рассмотрена... бля-бла...
</div>

<div class="popup" style="display: none;" id="register_form">
	<table>
		<tbody>
			<tr><td>Логин</td><td><input type="text" class="username"></td></tr>
			<tr><td>Пароль</td><td><input type="text" class="password"></td></tr>
			<tr><td>Имя</td><td><input type="text" class="contact_name"></td></tr>
			<tr><td>Фамилия</td><td><input type="text" class="contact_surname"></td></tr>
			<tr><td>Телефон</td><td><input type="text" class="contact_phone"></td></tr>
			<tr><td>E-Mail</td><td><input type="text" class="email"></td></tr>
			<tr><td>Группа:</td><td><select class="user_group"></select></td></tr>
		</tbody>
	</table>
	<table id="register_form_dropshipping" style="display: none;">
		<tbody>
			<tr><td>Название организации</td><td><input type="text" class="workname"></td></td></tr>
			<tr><td>ИНН</td><td><input type="text" class="inn"></td></td></tr>
			<tr><td>Сайт</td><td><input type="text" class="website"></td></td></tr>
		</tbody>
	</table>
	<input type="button" value="Отправить" onclick="sendRegisterForm();">
</div>

<script>

	$(document).ready(function() {

		getUserGroupsForRegister();

		$('#register_form').find('input').each(function(index, el) {
			$(this).on('focus', function(){
				$(this).parent().find('.input_error').remove();
			})
		});

		$('.user_group').on('change', function(){
			$('#register_form_dropshipping').slideUp();
			console.log($(this).val());
			switch ($(this).val()){
				case '6': $('#register_form_dropshipping').slideDown(); break;
			}
		})
	});

	function getUserGroupsForRegister(){
		$.ajax({
			url: 'http://franch.minon.ru/engine/ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {action: 'getUserGroupsForRegister'},
		})
		.done(function(data) {
			if (data.hasOwnProperty('success')){
				html = '';
				for(key in data.success){
					var group = data.success[key];
					html+= '<option value="' + group.id + '">' + group.name + '</option>'
				}
				$('#register_form').find('.user_group').html(html);
			}
		})
	}

	function sendRegisterForm(){
		$('.input_error').remove();
		var register = {};
		register.username = $('#register_form').find('.username').val();
		register.password = $('#register_form').find('.password').val();
		register.contact_name = $('#register_form').find('.contact_name').val();
		register.contact_surname = $('#register_form').find('.contact_surname').val();
		register.contact_phone = $('#register_form').find('.contact_phone').val();
		register.email = $('#register_form').find('.email').val();
		register.user_group = $('#register_form').find('.user_group').val();

		switch (register.user_group){
			case '6': 
				register.workname = $('#register_form_dropshipping').find('.workname').val();
				register.inn = $('#register_form_dropshipping').find('.inn').val();
				register.website = $('#register_form_dropshipping').find('.website').val();
				break;
		}

		$.ajax({
			url: 'http://franch.minon.ru/engine/ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {action: 'sendRegisterForm', register: register},
		})
		.done(function(data) {
			if (data.hasOwnProperty('error')){
				for (key in data.error){
					var error = data.error[key];
					$('#register_form').find('.' + key).after('<div class="input_error">' + error + '</div>')
				}
			}
			if (data.hasOwnProperty('success')){
				hidePopup();
				$('#register_success').find('.contact_name').text(register.contact_name);
				showPopup('#register_success');
			}
		})
		
	}
</script>