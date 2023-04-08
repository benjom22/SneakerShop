<?php
require 'BaseDao.class.php';
class SizeDao extends BaseDao{
    public function __construct(){
        parent::__construct("sizes");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?><?php
