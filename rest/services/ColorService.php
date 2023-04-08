<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/ColorDao.class.php";
class ColorService extends BaseService{
    public function __construct(){
        parent::__construct(new ColorDao());
    }

    public function add($entity){
        return parent::add($entity);

    }
}
?>