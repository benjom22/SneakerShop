<?php
require 'BaseDao.class.php';
class PaymentDao extends BaseDao{
    public function __construct(){
        parent::__construct("payments");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?>