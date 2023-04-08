<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/ProductPhotoDao.class.php";
class ProductPhotoService extends BaseService{
    public function __construct(){
        parent::__construct(new ProductPhotoDao());
    }

    public function add($entity){
        return parent::add($entity);

    }
}
?>