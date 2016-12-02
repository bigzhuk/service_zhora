<?php
namespace Price\Controller;

use Framework\Controller\Index;

class Price extends Index {

    /** @var null|\Price\Model\Price */
    private $model = null;
    /** @var null|\Price\Decorator\Price */
    private $decorator = null;

    public function __construct(\Price\Model\Price $model, \Price\Decorator\Price $decorator)
    {
        $this->setPriceModel($model);
        $this->setPriceDecorator($decorator);
    }

    public function getPriceModel()
    {
        return $this->model;
    }

    public function setPriceModel($model)
    {
        $this->model = $model;
    }

    public function getPriceDecorator()
    {
        return $this->decorator;
    }

    public function setPriceDecorator($decorator)
    {
        $this->decorator = $decorator;
    }

    /**
     * Действие по умолчанию
     * Выводит все новости в виде таблицы
     */
    public function actionIndex()
    {
        $out = '';
        $data = $this->getPriceModel()->getAllNews();
        $out .= $this->getPriceDecorator()->renderPriceTable($data);
        echo $out;
    }
}