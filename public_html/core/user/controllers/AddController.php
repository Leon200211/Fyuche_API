<?php


namespace core\user\controllers;

use core\user\models\Model;

class AddController extends BaseUser
{

    // определение действия
    protected $action = 'add';

    protected function inputData()
    {

        if(!$this->userId) $this->execBase();

        $this->createTableData();


        // Работа с данными из Post
        $this->checkPost();


    }

}