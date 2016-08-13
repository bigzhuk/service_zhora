<?php
namespace News\Decorator;

class News {
    const TEXT_CUT_LEGTH = 10;
    const MAX_TEXT_CUT_ATTEMPTS = 20;

    public function renderAll(array $new_rows) {
        $out = $this->renderAddNewButton();
        $out.= '<table border="1">';
            $out.= '<thead>';
                $out.= '<tr>';
                    $out.= '<td>Имя пользователя</td>';
                    $out.= '<td>Полный текст</td>';
                    $out.= '<td>Активен с</td>';
                    $out.= '<td>Активен</td>';
                    $out.= '<td>Действие</td>';
                $out.= '</tr>';
            $out.= '</thead>';
        foreach ($new_rows as $new_row) {
            $is_active_val = $new_row['is_active'] == 1 ? 'Да' : 'Нет';
            $out.= '<tr>';
                $out.= '<td>'.$new_row['title'].'</td>';
                $out.= '<td>'.$this->cutTexAndEndWithThreeDots($new_row['full_text']).'</td>';
                $out.= '<td>'.date('Y-m-d', $new_row['date_publish_start']).'</td>';
                $out.= '<td>'.$is_active_val.'</td>';
                $out.= '<td>
                            <a href = "otzivy.php?action=edit&id='.$new_row['id'].'">Редактировть</a>|
                            <a href = "otzivy.php?action=delete&id='.$new_row['id'].'">Удалить</a></td>';
            $out.= '</tr>';
        }
        $out.= '</table>';
        return $out;
    }

    /**
     * Рисует форму отзывов
     * @param array|null $row_new
     * @return string
     */
    public function renderNewEditForm($row_new = null) {
        $id = isset($row_new['id']) ? $row_new['id'] : '';
        $form_action = empty($id) ? 'addComplete' : 'editComplete';
        $title = isset($row_new['title']) ? $row_new['title'] : '';
        $full_text = isset($row_new['full_text']) ? $row_new['full_text'] : '';
        $date_publish_start = isset($row_new['date_publish_start']) ? $row_new['date_publish_start'] : '';
        $is_active_checked = $row_new['is_active'] == 1 ? 'checked' : '' ;
        $date_publish_start_val = !empty($date_publish_start) ? date('d.m.Y', $date_publish_start) : '';
        $out = '';
        $out .='<form name="addNewForm" class="" action="otzivy.php?action='.$form_action.'" method="post">';
            $out .='<table><tbody>';
            $out .='<input type="hidden" name="id" value="'.$id.'">';
            $out .='<tr><td>Имя пользователя:</td><td><input type="text" name="title" value="'.$title.'"></td></tr>';
            $out .='<tr><td>Начало публикации:</td><td><input type="text" class="datepicker" name="date_publish_start" value="'.$date_publish_start_val.'"></td></tr>';
            $out .='<tr><td>Активен?</td><td><input type="checkbox"  name="is_active" '.$is_active_checked.'></td></tr>';
            $out .='<tr><td colspan="2"><textarea style="width: 100%" name="full_text">'.$full_text.'</textarea></td></tr>';
            $out .='<tr><td colspan="2"><input type="submit" name="go"></td></tr>';
            $out .='</tbody></table>';
        $out .='</form>';
        return $out;
    }

    public function renderResultMsg($action, $result, $error_reason_code = null) {
        $out = '';
        if($result == \News\Controller\News::RESULT_ERROR) {
            $out.= $this->renderError($action);
            $out.= !is_null($error_reason_code) ? $this->renderErrorReason($error_reason_code) : '';
        }
        else {
            $out.= $this->renderSuccess($action);
        }
        return $out;
    }

    private function renderSuccess($action) {
        $out = '';
        switch($action) {
            case \News\Controller\News::UPDATE:
                $out.='<div class ="success">Информация отредактирована</div>';
                break;
            case \News\Controller\News::DELETE:
                $out.='<div class ="success">Информация удалена</div>';
                break;
            case \News\Controller\News::ADD:
                $out.='<div class ="success">Информация добавлена</div>';
                break;
        }
        return $out;
    }

    private function renderError($action) {
        $out = '';
        switch($action) {
            case \News\Controller\News::UPDATE:
                $out.='<div class ="error">Не удалось отредактировать Информация</div>';
                break;
            case \News\Controller\News::DELETE:
                $out.='<div class ="error">Не удалось удалить Информация</div>';
                break;
            case \News\Controller\News::SHOW:
                $out.='<div class ="error">Не удалось отобразить Информация</div>';
                break;
            case \News\Controller\News::ADD:
                $out.='<div class ="error">Не удалось добавить Информация</div>';
                break;
        }
        return $out;
    }

    /**
     * @param $error_reason_code
     * @return string
     */
    private function renderErrorReason($error_reason_code) {
        $out = '';
        switch($error_reason_code) {
            case \News\Controller\News::EMPTY_ID:
                $out.='<div class ="error_reason">Пустой ID рекламного блока</div>';
                break;
            case \News\Controller\News::DB_ERROR:
                $out.='<div class ="error_reason">Ошибка базы данных</div>';
                break;
        }
        return $out;
    }

    public function renderAddNewButton() {
        $out = '<a href = "otzivy.php?action=add">Добавить</a>';
        return $out;
    }

    /**
     * Возвращает обрезанную строку до длины $length_after_cut с троеточием на конце.
     * Если длина переданной строки меньше $length_after_cut, возвращает ее без имзенений.
     * @param string $text
     * @param int $length_after_cut
     * @return string
     */
    protected function cutTexAndEndWithThreeDots($text, $length_after_cut = self::TEXT_CUT_LEGTH) {
        $attempts = 0;
        $punctuation_marks = array('.', '!', ',', ':', ';', '...');
        if(strlen($text) <= $length_after_cut) {
            return $text;
        }
        while($text[$length_after_cut] != ' ') {
            $length_after_cut++;
            $attempts++;
            if($attempts > self::MAX_TEXT_CUT_ATTEMPTS) {
                break;
            }
            if(strlen($text) <= $length_after_cut) {
                return $text;
            }
        }
        if(in_array($text[$length_after_cut-1], $punctuation_marks)) {
            $length_after_cut--;
        }
        return substr($text, 0, $length_after_cut).'...';

    }

    public static function renderNewsEditLink() {
        $out = '<a href="http://'.$_SERVER['HTTP_HOST'].'/admin/otzivy.php">Редактировать рекламный блок сайта</a>';
        return $out;
    }

 


}