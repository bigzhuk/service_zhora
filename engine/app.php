<?php
class App {
    const COMPANY_NAME = 'АвтоМоторс-50';
    const DEFAULT_TITLE = 'Атосервис г. Пушкино';
    const COMPANY_EMAIL = 'zhora.cejba@mail.ru';

    public static $phones = [
        '+7(909)999-39-90', '+7(906)626-51-45'
    ];
    public static  $services = [
        'car_repair' => 'Кузовной ремонт',
        'engine_repair' => 'Ремонт двигателя',
        'gear_repair' =>  'Ремонт трансмиссии',
        'electrics_repair' => 'Ремонт электрики',
        'tyres_service' => 'Шиномонтаж',
        'to_contracts' => 'Эвакуатор, грузоперевозки, аренда автобуса',
    ];
    public static  $pages = [
        '/about' => 'О компании',
        '/contacts' => 'Контакты',
        '/price_list' => 'Цены',
        '/service' => 'Услуги',
        '/service/car_repair' => 'Кузовной ремонт',
        '/service/engine_repair' => 'Ремонт двигателя',
        '/service/gear_repair' => 'Ремонт трансмиссии',
        '/service/electrics_repair' => 'Ремонт электрики',
        '/service/tyres_service' => 'Шиномонтаж',
        '/service/to_contracts' => 'Эвакуатор, грузоперевозки, аренда автобуса',

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