<?php
require 'BaseDao.class.php';
class UserDao extends BaseDao{
    public function __construct(){
        parent::__construct("user");
    }

    public function get_all(){
        return parent::get_all();
    }
}

?>