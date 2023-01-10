<?php


namespace core\user\controllers;




use core\user\models\Model;
use core\base\settings\Settings;


// индексный контроллер для админа
class IndexController extends BaseUser
{

    protected function inputData(){

//        $redirect = PATH . Settings::get('routes')['admin']['alias'] . '/show';
//        $this->redirect($redirect);


        echo 1;

    }

}