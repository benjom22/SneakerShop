<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/VendorDao.class.php";
class VendorService extends BaseService{
    public function __construct(){
        parent::__construct(new VendorDao());
    }

    public function add($entity){
        return parent::add($entity);

    }
}
?>