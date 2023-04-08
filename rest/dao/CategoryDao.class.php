<?php
require 'BaseDao.class.php';
class CategoryDao extends BaseDao{
    public function __construct(){
        parent::__construct("category");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?>