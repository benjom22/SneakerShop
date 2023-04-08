<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/CategoryDao.class.php";
class CategoryService extends BaseService{
    public function __construct(){
        parent::__construct(new CategoryDao());
    }

    public function add($entity){
        return parent::add($entity);

    }
}
?>