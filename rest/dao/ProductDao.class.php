<?php
require_once "BaseDao.class.php";
class ProductDao extends BaseDao{
    public function __construct(){
        parent::__construct("products");
    }

    public function get_all(){
        return parent::get_all();
    }

    public function get_latest(){
        return parent::get_latest();
    }

}

?>