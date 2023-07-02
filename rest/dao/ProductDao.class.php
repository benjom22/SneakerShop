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
        return parent::query("SELECT * FROM products ORDER BY id DESC LIMIT 4", []);
    }

    public function featured_products(){
        return parent::query("SELECT * FROM products ORDER BY RAND() LIMIT 4", []);
    }

    public function special_product(){
        return parent::query("SELECT * FROM products ORDER BY RAND() LIMIT 1", []);
    }

}

?>