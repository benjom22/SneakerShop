<?php
require 'BaseDao.class.php';
class ProductPhotoDao extends BaseDao{
    public function __construct(){
        parent::__construct("productphoto");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?><?php
