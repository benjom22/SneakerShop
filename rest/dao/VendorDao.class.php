<?php
require 'BaseDao.class.php';
class VendorDao extends BaseDao{
    public function __construct(){
        parent::__construct("vendors");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?>