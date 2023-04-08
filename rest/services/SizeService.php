<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/SizeDao.class.php";
class SizeService extends BaseService{
    public function __construct(){
        parent::__construct(new SizeDao());
    }

    public function add($entity){
        return parent::add($entity);

    }
}
?>