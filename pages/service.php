<h1>Услуги</h1>
<div class="container">
<p>
	Компания «<?= App::COMPANY_NAME ?>» с 2002 года осуществлят ремонт <strong>двигателя</strong>, <strong>коробки передач</strong>, <strong>электрики</strong> и оказывает иные услуги.
	Также к вашим услугам <strong>шиномонтаж</strong> и <strong>эвакуатор</strong>.
	Ежедневно с 9 до 20, позвонив по телефону <?php echo App::$phones[0] .' или '. App::$phones[1]?>, вы получите клалифицированную консультацию специалиста,
	по вашей проблеме, а также сможете записаться в наш автосервис.
</p>
</div>

<div class="container">

	<center>
		<div id="services_wrapper">
			<ul id="services">
				
				<a href="service/car_repair">
					<div class="image" style="background-image: url('images/menu_item_06.jpg');"></div>
					<div class="text"><?= APP::$services['car_repair']?></div>
				</a>

				<a href="service/engine_repair">
					<div class="image" style="background-image: url('images/menu_item_01.jpg');"></div>
					<div class="text"><?= APP::$services['engine_repair']?></div>
				</a>
				<a href="service/gear_repair">
					<div class="image" style="background-image: url('images/menu_item_08.jpg');"></div>
					<div class="text"><?=APP::$services['gear_repair']?></div>
				</a>
				<a href="service/electrics_repair">
					<div class="image" style="background-image: url('images/menu_item_02.jpg');"></div>
					<div class="text"><?=APP::$services['electrics_repair']?></div>
				</a>
				<a href="service/tyres_service">
					<div class="image" style="background-image: url('images/menu_item_03.jpg');"></div>
					<div class="text"><?=APP::$services['tyres_service']?></div>
				</a>
				<a href="service/to_contracts">
					<div class="image" style="background-image: url('images/menu_item_04.jpg');"></div>
					<div class="text"><?=APP::$services['to_contracts']?></div>
				</a>
			</ul>
		</div>
	</center>
	<div style="clear:both"></div>
</div>
