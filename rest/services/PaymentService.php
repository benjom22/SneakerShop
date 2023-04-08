<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/PaymentDao.class.php";
class PaymentService extends BaseService{
    public function __construct(){
        parent::__construct(new PaymentDao());
    }

    public function add($entity){
        return parent::add($entity);

    }
}
?>