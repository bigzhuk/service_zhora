<h1>Автосервис в Пушкино</h1>
<div class="container">
    <p>
        <span style="margin-left: 30px;">Компания</span> «<?= App::COMPANY_NAME ?>» осуществляет ремонт <strong>двигателя</strong>, <strong>коробки передач</strong>, <strong>электрики</strong> и оказывает иные услуги.
        На территории автосервиса работает <strong>шиномонтаж</strong>. На случай, если вы не можете добраться до места ремонта самостоятельно предусмотрена услуга круглосуточного <strong>вызова эвакуатора</strong>.
        Ежедневно с 9 до 20, позвонив по телефону <?php echo App::$phones[0] .' или '. App::$phones[1]?>, вы получите квалифицированную консультацию специалиста,
        по вашей проблеме, а также сможете записаться в наш автосервис.
    </p>
</div>

<div class="container">

    <div id="services_wrapper">
        <ul id="services">

            <a href="service/car_repair/">
                <div class="image image1"></div>
                <div class="text"><?= App::$services['car_repair']?></div>
            </a>

            <a href="service/engine_repair/">
                <div class="image image2"></div>
                <div class="text"><?= App::$services['engine_repair']?></div>
            </a>
            <a href="service/gear_repair/">
                <div class="image image3"></div>
                <div class="text"><?=App::$services['gear_repair']?></div>
            </a>
            <a href="service/electrics_repair/">
                <div class="image image4"></div>
                <div class="text"><?=App::$services['electrics_repair']?></div>
            </a>
            <a href="service/tyres_service/">
                <div class="image image5" ></div>
                <div class="text"><?=App::$services['tyres_service']?></div>
            </a>
            <a href="service/evacuator/">
                <div class="image image6"></div>
                <div class="text"><?=App::$services['evacuator']?></div>
            </a>
            <a href="service/diagnostics/">
                <div class="image image7"></div>
                <div class="text"><?=App::$services['diagnostics']?></div>
            </a>
            <a href="service/suspension/">
                <div class="image image8"></div>
                <div class="text"><?=App::$services['suspension']?></div>
            </a>
            <a href="service/to/">
                <div class="image image9"></div>
                <div class="text"><?=App::$services['to']?></div>
            </a>
            <a href="service/insurance/">
                <div class="image image10"></div>
                <div class="text"><?=App::$services['insurance']?></div>
            </a>
            <a href="service/truck_repair/">
                <div class="image image11"></div>
                <div class="text"><?=App::$services['truck_repair']?></div>
            </a>
        </ul>
    </div>

    <div style="clear:both"></div>
</div>

<div class="container">
    <p>Наш автосервис работает в городе Пушкино  уже 8 лет и за это время заслужил отличную репутацию среди жителей нашего города. Наш автосервис оказывает самый широкий спектр услуг. Мы занимаемся ходовой,  двигателями,  покраской,  автоэлектрикой, установкой дополнительного оборудования. И это далеко не весь спектр того, что мы умеем.
        Но главным преимуществом нашего автосервиса является качество, на которое мы всегда делаем акцент в работе. При этом наши цены остаются доступными. </p>
    <p>Пришло время проходить ТО? Теперь вовсе не обязательно ехать в Москву, чтобы получить сервис надлежащего качества. Сломалась сигнализация? Наш <strong>автосервис в Пушкино</strong> сможет вам помочь. Загорелась лампочка «проверьте двигатель»? И здесь мы не оставим вас без квалифицированной поддержки.</p>
    <p>Мы гордимся нашей работой и репутацией. Мы никогда не пишем хвалебные <strong>отзывы о нашем автосервисе в Пушкино</strong> сами – в этом нет нужды. Практически все отзывы, которые вы найдете о нас - положительные и оставлены благодарными клиентами. Мы всегда разбираем ситуации, когда клиент остался не полностью доволен работой и всегда идем навстречу, бесплатно исправляем ошибки. Впрочем такие ситуации случаются крайне редко.  Если вы еще не определились с выбором автосервиса знайте: для жителей Пушкино и Пушкинского района выбор очевиден – «<?= App::COMPANY_NAME ?>».</p>
</div>
