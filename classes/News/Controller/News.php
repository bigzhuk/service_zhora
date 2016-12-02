<?php

namespace News\Controller;

use Framework\Controller\Index;

class News extends Index {
    /**
     * Типы результата
     */
    const RESULT_SUCCESS = 1;
    const RESULT_ERROR = 2;
    const RESULT_VALIDATE_ERROR = 3;

    /**
     * Действия
     */
    const UPDATE = 1;
    const DELETE = 2;
    const SHOW = 3;
    const ADD = 4;

    /**
     * Причины ошибок
     */
    const EMPTY_ID = 1;
    const DB_ERROR = 2;

    /** @var null|\News\Model\News */
    private $model = null;
    /** @var null|\News\Decorator\News */
    private $decorator = null;

    public function __construct(\News\Model\News $model, \News\Decorator\News $decorator) {
        $this->setNewsModel($model);
        $this->setNewsDecorator($decorator);
    }

    public function getNewsModel() {
        return $this->model;
    }

    public function setNewsModel($model) {
        $this->model = $model;
    }

    public function getNewsDecorator() {
        return $this->decorator;
    }

    public function setNewsDecorator($decorator) {
        $this->decorator = $decorator;
    }

    /**
     * Действие по умолчанию
     * Выводит все новости в виде таблицы
     */
    public function actionIndex() {
        $out = \Auth\Decorator\Auth::renderExitLink().'<br/><br/>';
        if(isset($_GET['msg_action']) && !empty($_GET['msg_action'])) {
            $error_reason = isset($_GET['msg_err_reason']) ? $_GET['msg_err_reason'] : '';
            echo $this->getNewsDecorator()->renderResultMsg($_GET['msg_action'],$_GET['msg_result'], $error_reason);
        }
        $data = $this->getNewsModel()->getAllNews();
        $out .= $this->getNewsDecorator()->renderAll($data);
        echo $out;
    }

    /** Показывает отзывы на фронте, а также форму для добавления отзыва */
    public function actionShowAllPublished() {
        $out = '';
        $data = $this->getNewsModel()->getAllPublishedNews();
        $out .= $this->getNewsDecorator()->renderAll($data);
        $this->sendOtzivByAjax(); //Отправляем отызыв аяксом
        $out .=$this->getNewsDecorator()->renderNewEditForm();

        echo $out;
    }

    public function sendOtzivByAjax() {
        echo
        '<script>
            $(document).ready(function() {
                $("#sendOtziv").on("click", function () {
                    otziv();
                });         
            });
            function otziv() {
                var title = $("#title").val();
		        var full_text = $("#full_text").val();
		        var validate_error = false;
		        
		        if (title == "") {
		            $("#title").css({"border" : "1px solid red"});
		            validate_error = true;
		        } else {
		             $("#title").css({"border" : "1px solid black"});
		        }
		      
		        if (full_text == "") {
		            $("#full_text").css({"border" : "1px solid red"});
		            validate_error = true;
		        } else {
		             $("#full_text").css({"border" : "1px solid black"});
		        }
		        
		        if (validate_error == true) {
		            return;
		        }
		        
                $.ajax({
                    url: \'engine/ajax.php\',
                    type: \'POST\',
                    dataType: \'json\',
                    data: {action: \'otziv\', title: title, full_text: full_text},
                })
                .done(function(data) {
                     $("#title").val("");
                     $("#full_text").val("");
                     $("#otziv_message").text("Отзыв отправлен и будет опубликован на сайте в ближайшее время.");
                });
	}
        </script>';
    }

    public function addOtzivByAjax() {
        $title = $_POST['title'];
        $full_text = $_POST['full_text'];
        if (!$this->validate($title, $full_text)) {
            return self::RESULT_VALIDATE_ERROR;
        }
        if ($this->getNewsModel()->addNew($title, $full_text, date('Y-m-d'), 0)) {
            return self::RESULT_SUCCESS;
        }
        return self::RESULT_ERROR;
    }

    /**
     * Форма добавления новости
     */
    public function actionAdd() {
        $out = $this->getNewsDecorator()->renderNewEditForm();
        echo $out;
    }

    public function validate($title, $full_text) {
        return !empty($title) && !empty($full_text);
    }

    /**
     * Добавление новости
     */
    public function actionAddComplete() {
        $title = $_POST['title'];
        $full_text = $_POST['full_text'];
        $date_publish_start = $_POST['date_publish_start'];
        $is_active = $_POST['is_active'] == 'on' ? 1 : 0;
        $result = $this->getNewsModel()->addNew($title, $full_text, $date_publish_start, $is_active);
        $result ?
            $this->redirectToIndex(self::ADD, self::RESULT_SUCCESS):
            $this->redirectToIndex(self::ADD, self::RESULT_ERROR, self::DB_ERROR);
    }


    /**
     * Форма редактирования новости
     */
    public function actionEdit() {
        $out = '';
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if(empty($id)) {
            $out .= $this->getNewsDecorator()->renderResultMsg(self::SHOW, self::RESULT_ERROR, self::EMPTY_ID);
        }
        else {
            $new_row = $this->getNewsModel()->getNewById($id);
            $out .= $this->getNewsDecorator()->renderNewEditForm($new_row);
        }
        echo $out;
    }

    /**
     * Редактирование новости
     */
    public function actionEditComplete() {
        $out = '';
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        if(empty($id)) {
            $out .= $this->getNewsDecorator()->renderResultMsg(self::UPDATE, self::RESULT_ERROR, self::EMPTY_ID);
            echo $out;
            return null;
        }
        else {
            $id = (int)$_POST['id'];
            $title = $_POST['title'];
            $full_text = $_POST['full_text'];
            $date_publish_start = $_POST['date_publish_start'];
            $is_active = (isset($_POST['is_active']) && $_POST['is_active']) == 'on' ? 1 : 0;
            $result = $this->getNewsModel()->updateNewById($id, $title, $full_text, $date_publish_start, $is_active);
            $result ?
                $this->redirectToIndex(self::UPDATE, self::RESULT_SUCCESS):
                $this->redirectToIndex(self::UPDATE, self::RESULT_ERROR, self::DB_ERROR);
        }
    }

    /**
     * Удаление новости
     */
    public function actionDelete() {
        $out = '';
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if(empty($id)) {
            $out .= $this->getNewsDecorator()->renderResultMsg(self::DELETE, self::RESULT_ERROR, self::EMPTY_ID);
        }
        else{
            $result = $this->getNewsModel()->deleteNewById($id);
            $result ?
                $this->redirectToIndex(self::DELETE, self::RESULT_SUCCESS):
                $this->redirectToIndex(self::DELETE, self::RESULT_ERROR, self::DB_ERROR);
        }
        echo $out;

    }
    
    public function redirectToIndex($action, $result, $error_reason_code = null) {
        $url = 'http://'.$_SERVER['HTTP_HOST'].'/admin/otzivy.php?msg_action='.$action.'&msg_result='.$result;
        $url.= !is_null($error_reason_code) ? '&msg_err_reason='.$error_reason_code : '';
        echo
        '<script language="JavaScript">
        window.location.replace("'.$url.'");
        </script>';
    }

}