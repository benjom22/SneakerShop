<?php
require 'BaseDao.class.php';
class ColorDao extends BaseDao{
    public function __construct(){
        parent::__construct("colors");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?>