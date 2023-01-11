<?php


namespace core\user\controllers;

use core\base\settings\Settings;
use core\user\models\Model;


class ShowController extends BaseUser
{

    protected function inputData(){

        if(!$this->userId) $this->execBase();

        // получение структуры таблицы
        $this->createTableData();


        $where = '';
        if(isset($this->parameters['id'])){
            $where = ['id' => $this->parameters['id']];
        }

        $fields_for_select = [
            'fields' => ['id', 'id_record', 'full_name', 'company', 'phone', 'email' , 'date_of_birth', 'photo', 'note'],
            'where' => $where
        ];

        $this->createData($fields_for_select);


    }




    /**
     * @param array $arr
     * @param bool $add если true и пришел arr, то добавить это к основному запросу
     */
    // получаем данные из БД
    protected function createData($arr = []){

        $fields = [];
        $order = [];
        $order_direction = [];
        $where = '';


//        if(!$this->columns['id_row']) return $this->data = [];
//
//        $fields[] = $this->columns['id_row'] . ' as id';
//
//        if($this->columns['name']) $fields['name'] = 'name';
//        if($this->columns['img']) $fields['img'] = 'img';
//
//        if(count($fields) < 3){
//            foreach ($this->columns as $key => $item){
//                if(!$fields['name'] and strpos($key, 'name') !== false){
//                    $fields['name'] = $key . ' as name';
//                }
//                // если в бд название строго начинается с "img"
//                if(!$fields['img'] and strpos($key, 'img') === 0){
//                    $fields['img'] = $key . ' as img';
//                }
//            }
//        }

        // склеиваем массивы
        if(isset($arr['fields'])){
            if(is_array($arr['fields'])){
                $fields = Settings::getInstance()->arrayMergeRecursive($fields, $arr['fields']);
            }else{
                $fields[] = $arr['fields'];
            }
        }

        if(isset($arr['where'])){
            $where = $arr['where'];
        }



        // склеиваем массивы
        if(isset($arr['order'])){
            if(is_array($arr['order'])) {
                $order = Settings::getInstance()->arrayMergeRecursive($order, $arr['order']);
            }else{
                $order[] = $arr['order'];
            }
        }
        if(isset($arr['order_direction'])){
            if(is_array($arr['order_direction'])) {
                $order_direction = Settings::getInstance()->arrayMergeRecursive($order_direction, $arr['order_direction']);
            }else{
                $order_direction[] = $arr['order_direction'];
            }
        }

        // проверки
        $this->data = $this->model->read($this->table,[
            'fields' => $fields,
            'order' => $order,
            'order_direction' => $order_direction,
            'where' => $where
        ]);

    }



}