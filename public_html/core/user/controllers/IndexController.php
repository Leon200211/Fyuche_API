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


        if(!$this->userId) $this->execBase();

        // получение структуры таблицы
        $this->createTableData();


        $fields_for_select = [
            'fields' => ['id', 'id_record', 'full_name', 'company', 'phone', 'email' , 'date_of_birth', 'photo', 'note']
        ];

        $this->createData($fields_for_select);



        //return $this->expansion(get_defined_vars());


        //echo 1;

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
        if($arr['fields']){
            if(is_array($arr['fields'])){
                $fields = Settings::getInstance()->arrayMergeRecursive($fields, $arr['fields']);
            }else{
                $fields[] = $arr['fields'];
            }
        }


        // сортировка элементов в панели
//        if($this->columns['parent_id']){
//            if(!in_array('parent_id', $fields)){
//                $fields[] = 'parent_id';
//            }
//            $order[] = 'parent_id';
//        }
//        if($this->columns['menu_position']){
//            $order[] = 'menu_position';
//        }else if($this->columns['date']){
//            if($order){
//                $order_direction = ['ASC', 'DESC'];
//            }else{
//                $order_direction[] = 'DESC';
//            }
//            $order[] = 'date';
//        }


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
            'order_direction' => $order_direction
        ]);

    }






}