<?php
class App {
    const COMPANY_NAME = 'АвтоМоторс-50';
    const DEFAULT_TITLE = 'Автосервис г. Пушкино';
    const COMPANY_EMAIL = 'avto.motors-50@yandex.ru';

    public static $phones = [
        '<a class="none_decorated_link" href="tel:+79096265145">+7(909)626-51-45</a>', '<a class="none_decorated_link" href="tel:+79651258080">+7(965)125-80-80</a>'
    ];
    public static  $services = [
        'car_repair' => 'Кузовной ремонт',
        'engine_repair' => 'Ремонт двигателя',
        'gear_repair' =>  'Ремонт трансмиссии',
        'electrics_repair' => 'Ремонт электрики',
        'tyres_service' => 'Шиномонтаж',
        'evacuator' => 'Эвакуатор, грузоперевозки, аренда автобуса',
        'diagnostics' => 'Диагностика авто',
        'to' => 'Техобслуживание авто',
        'suspension' => 'Ремонт подвески',
        'insurance' => 'Автострахование',
        'truck_repair' => 'Ремонт грузовых машин',
    ];
    public static  $pages = [
        '/' =>
            [
                'title' =>'«АвтоМоторс-50» - Автосервис в Пушкино',
                'description' => 'Автосервис в Пушкино «АвтоМоторс-50» предлагает услуги по ремонту автомобилей любых марок с гарантией качества. Работает шиномонтаж, заказать услуги эвакуатора можно круглосуточно',
                'keywords' => 'Автосервис в Пушкино, шиномонтаж, эвакуатор'
            ],
        '/otzivy' =>
            [
                'title' =>'Отзывы',
                'description' => 'Автосервис в Пушкино «АвтоМоторс-50» предлагает услуги по ремонту автомобилей любых марок с гарантией качества. Работает шиномонтаж, заказать услуги эвакуатора можно круглосуточно',
                'keywords' => ' Отзывы Автосервис Пушкино'
            ],
        '/about' =>
            [
                'title' =>'О компании',
                'description' => 'Автосервис в Пушкино «АвтоМоторс-50» предлагает услуги по ремонту автомобилей любых марок с гарантией качества. Работает шиномонтаж, заказать услуги эвакуатора можно круглосуточно',
                'keywords' => 'О комании «АвтоМоторс-50»'
            ],
        '/contacts' =>
            [
                'title' =>'Контактная информация «АвтоМоторс-50»',
                'description' => 'Автосервис в Пушкино «АвтоМоторс-50» находится в городе Пушкино. Нас легко найти. Звоните или приезжайте. ',
                'keywords' => 'Контактная информация, схема проезда, «АвтоМоторс-50»'
            ],
        '/price_list' =>
            [
                'title' =>'Цены на услуги автосервиса в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предоставляет услуги по выполнению ремонта и технического обслуживания автомобилей по выгодной стоимости. Наш автосервис в Пушкино цены на работы устанавливает вполне доступные.',
                'keywords' => 'Автосервис Пушкино цены'
            ],
        '/service' =>
            [
                'title' => 'Услуги автосервиса в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает широкий спектр услуг по ремонту легковых и грузовых автомобилей',
                'keywords' => 'Перечень услуг автосервиса Пушкино'
            ],
        '/vacansy' =>
            [
                'title' => 'Вакансии автосервиса в Пушкино',
                'description' => 'Автосервис в Пушкино «АвтоМоторс-50» приглашает на работу автослесарей, автоэлектриков и других специалистов',
                'keywords' => 'Работа в автосервисе в Пушкино'
            ],
        '/service/car_repair' =>
            [
                'title' =>'Кузовной ремонт в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает выполнить кузовной ремонт в Пушкино. Также нашими мастерами осуществляется покраска авто в Пушкино на выгодных условиях. Обращайтесь к нам, высокое качество работ гарантируется!',
                'keywords' => 'Кузовной ремонт и покраска Пушкино'
            ],
        '/service/engine_repair' =>
            [
                'title' =>'Ремонт двигателя в Пушкино',
                'description' => 'Автосервис в Пушкино «АвтоМоторс-50» предлагает услуги по ремонту автомобилей любых марок с гарантией качества. Работает шиномонтаж, заказать услуги эвакуатора можно круглосуточно',
                'keywords' => 'Ремонт двигателя в Пушкино'
            ],
        '/service/gear_repair' =>
            [
                'title' =>'Ремонт трансмиссии в Пушкино',
                'description' => 'Автосервис «АвтоМоторс-50» предлагает вам следующие виды услуг: ремонт АКПП в Пушкино и ремонт МКПП в Пушкино. Ремонт коробки в Пушкино выполняется на современном оборудовании. Обращайтесь!',
                'keywords' => 'Ремонт коробки (АКПП, МКПП) Пушкино'
            ],
        '/service/electrics_repair' =>
            [
                'title' =>'Ремонт электрики в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» выполняет ремонт автомобильной электрики. Обращайтесь к нам, автоэлектрик в Пушкино проведет диагностику и отремонтирует автомобиль с гарантией качества.',
                'keywords' => 'Автоэлектрик пушкино'
            ],
        '/service/tyres_service' =>
            [
                'title' => 'Шиномонтаж в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает шиномонтаж в Пушкино по доступной цене. Мы гарантируем оперативное и качественное выполнение работ с использованием современного оборудования. Обращайтесь к нам!',
                'keywords' => 'Шиномонтаж в Пушкино',
            ],
        '/service/evacuator' =>
            [
                'title' => 'Эвакуатор, грузоперевозки, аренда автобуса в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает эвакуатор в Пушкино. Мы предоставляем эвакуатор Пушкинский район на выгодных условиях. Обращайтесь, к вашим услугам эвакуатор круглосуточно.',
                'keywords' => 'Эвакуатор Пушкино и Пушкинский район круглосуточно',
            ],
        '/service/diagnostics' =>
            [
                'title' => 'Диагностика авто в Пушкино',
                'description' => 'Компания «Автомоторс-50» предлагает следующие услуги: диагностика авто в Пушкино, компьютерная диагностика в Пушкино. Диагностика автомобиля в Пушкино выполняется на современном оборудовании.',
                'keywords' => 'Компьютерная диагностика авто пушкино',
            ],
        '/service/to' =>
            [
                'title' => 'Техобслуживание авто в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает обслуживание авто в Пушкино на выгодных условиях. У нас можно пройти ТО в Пушкино (замена масла в Пушкино и другие профилактические мероприятия). Обращайтесь!',
                'keywords' => 'Обслуживание авто Пушкино, пройти ТО в Пушкино, замена масла',
            ],
        '/service/suspension' =>
            [
                'title' => 'Ремонт подвески в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает вам выполнить ремонт подвески в Пушкино по доступной цене. На ремонт ходовой в Пушкино предоставляется гарантия. Обращайтесь, мы выполняем ремонт качественно!',
                'keywords' => 'Ремонт подвески и ходовой ходовой Пушкино',
            ],
        '/service/insurance' =>
            [
                'title' => 'Автострахование в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает страхование вашего авто в Пушкино по выгодной цене. Страховка оформляется быстро. Обращайтесь, мы делаем нашу работу качественно!',
                'keywords' => 'Ремонт подвески и ходовой ходовой Пушкино',
            ],
        '/service/truck_repair' =>
            [
                'title' => 'Ремонт грузовых автомобилей в Пушкино',
                'description' => 'Компания «АвтоМоторс-50» предлагает вам выполнить ремонт грузовых автомобилей в Пушкино по доступной цене. Мы справимся с ремонтом грузовиков любой сложности. Обращайтесь, мы выполняем ремонт качественно!',
                'keywords' => 'Ремонт грузовых автомобилей Пушкино, ремонт грузовиков Рушкино, ремонт грузовых машин Пушкино',
            ],

    ];


    public static function getPageInfo($keyword) {
        $current_page = $_SERVER['REQUEST_URI'];
        if(!empty(self::$pages[$current_page][$keyword])) {
            return self::$pages[$current_page][$keyword];
        }
        return '';
    }

    public static function isMainPage() {
        return !empty(preg_match('/^\/(?:\?.*)*$/', $_SERVER['REQUEST_URI'], $match));
    }
}
?>