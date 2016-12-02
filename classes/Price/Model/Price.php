<?php
namespace Price\Model;
use DB\DB;

class Price {

    public function getTableName() {
        return 'price';
    }

    /**
     * Возврщает массив строк таблицы
     * @return array
     */
    public function getAllNews() {
        $data = array();
        $query = 'SELECT * FROM '.$this->getTableName();
        $result = DB::i()->getPDO()->query($query);
        while($row = $result->fetch()) {
            $data[] = $row;
        }
        return $data;
    }

}