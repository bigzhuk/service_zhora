<?php
namespace Price\Decorator;

class Price {

    public function renderPriceTable(array $price_rows) {
        $out = '';
        $out.= '<table id="pricelist">';
        $out.= '<thead>';
        $out.= '<tr>';
        $out.= '<td>Наименование работ</td>';
        $out.= '<td>Отечественные автомобили</td>';
        $out.= '<td>Импортные автомобили</td>';
        $out.= '<td>Внедорожники, микроавтобусы</td>';
        $out.= '</tr>';
        $out.= '</thead>';
        $prev_cat_id = null;
        foreach ($price_rows as $price_row) {
            if ($price_row['category_id'] !== $prev_cat_id) {
                $prev_cat_id = $price_row['category_id'];
                $out .= $this->renderCategoryRow($price_row['category_id'], $price_row['category_id']);
            }
            $out.= '<tr>';
            $out.= '<td>'.$price_row['id'].'</td>';
            $out.= '<td>'.$price_row['id'].'</td>';
            $out.= '<td>'.$price_row['id'].'</td>';
            $out.= '<td>'.$price_row['id'].'</td>';
            $out.= '</tr>';
        }
        $out.= '</table>';
        return $out;
    }

    public function renderCategoryRow($cat_name, $cat_css_id) {
        return '<tr><td id="'.$cat_name.'" colspan="100%" class="subhead">'.$cat_css_id.'</td></tr>';
    }
}
