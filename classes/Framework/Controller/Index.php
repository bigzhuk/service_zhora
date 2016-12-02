<?php

namespace Framework\Controller;

abstract class Index {
    public function run() {
        if(!isset($_GET['action']) || empty($_GET['action'])) {
            $this->actionIndex();
            return null;
        }
        $method = 'action'.ucfirst($_GET['action']);
        if(method_exists($this, $method)) {
            $this->$method();
        }
        else {
            $this->actionIndex();
        }
    }

    abstract public function actionIndex();
    
}