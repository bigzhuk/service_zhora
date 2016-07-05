<?php
class App {
    const COMPANY_NAME = 'АвтоМоторс-50';
    const DEFAULT_TITLE = 'Атосервис г. Пушкино';
    const COMPANY_EMAIL = 'zhora.cejba@mail.ru';

    public static $phones = [
        '+7(909)626-51-45', '+7(965)125-80-80'
    ];
    public static  $services = [
        'car_repair' => 'Кузовной ремонт',
        'engine_repair' => 'Ремонт двигателя',
        'gear_repair' =>  'Ремонт трансмиссии',
        'electrics_repair' => 'Ремонт электрики',
        'tyres_service' => 'Шиномонтаж',
        'evacuator' => 'Эвакуатор, грузоперевозки, аренда автобуса',
    ];
    public static  $pages = [
        '/about' => 'О компании',
        '/contacts' => 'Контакты',
        '/price_list' => 'Цены на услуги автосервиса в Пушкино',
        '/service' => 'Услуги автосервиса в Пушкино',
        '/service/car_repair' => 'Кузовной ремонт в Пушкино',
        '/service/engine_repair' => 'Ремонт двигателя в Пушкино',
        '/service/gear_repair' => 'Ремонт трансмиссии в Пушкино',
        '/service/electrics_repair' => 'Ремонт электрики в Пушкино',
        '/service/tyres_service' => 'Шиномонтаж в Пушкино',
        '/service/evacuator' => 'Эвакуатор, грузоперевозки, аренда автобуса в Пушкино',

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