<?php


namespace core\user\controllers;


use core\base\settings\Settings;
use core\user\models\Model;


// контроллер для добавление информации через админ панель
class EditController  extends BaseUser
{


    // определение действия
    protected $action = 'update';

    protected function inputData()
    {

        if(!$this->userId) $this->execBase();

        if(!isset($this->parameters['id'])){
            exit('не указан id');
        }

        $this->createTableData();

        // Работа с данными из Post
        $this->checkPost();

    }




}