<?php
require 'BaseDao.class.php';
class ProductDao extends BaseDao{
    public function __construct(){
        parent::__construct("products");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?>