<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/OrderDao.class.php";
class OrderService extends BaseService{
    public function __construct(){
        parent::__construct(new OrderDao());
    }

    public function add($entity){
        return parent::add($entity);

    }
}
?>