<?php
namespace News\Decorator;

use DB\Escape;

class OtzivyFront extends News {
    
    public function renderAll(array $new_rows) {
        $out = '';
        foreach ($new_rows as $new_row) {
            $out.= '<div>';
                $out.= '<div><strong>Имя пользователя:</strong> '.$new_row['title'].'</div>';
                $out.= '<div><strong>Опубликовано:</strong> '.date('Y-m-d', $new_row['date_publish_start']).'</div>';
                $out.= '<div style="border: 1px solid gray; margin: 10px;">
                            <div style="padding: 5px">'.nl2br($new_row['full_text']).'</div>
                        </div>';
            $out.= '</div>';
        }
        echo $out;
    }

    public function renderNewEditForm($row_new = null) {
        $title = isset($row_new['title']) ? $row_new['title'] : '';
        $full_text = isset($row_new['full_text']) ? $row_new['full_text'] : '';
        $out = '';
        $out.= '    <br/><div>';
            $out.= '<div id="otziv_message" style="text-align: center; color: #e19109"></div>';
            $out.= '<div><strong>Имя пользователя:</strong> <input id="title" type="text" name="title" value="'.$title.'"></div>';
            $out.= '<div style="margin: 10px 17px 10px 11px;"><textarea id="full_text" style="width: 100%" name="full_text" rows="8">'.$full_text.'</textarea></div>';
            $out.= '<div><input type="button" name="sendOtziv" id="sendOtziv" value="Отправить"></div>';
        $out.= '</div>';
        //TODO сделать ограничение на яваскрипте по симолам кол-ву символов!
        echo $out;
    }
}