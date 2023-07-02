<?php

class BaseService {
    private $dao;

    public function __construct($dao){
        $this->dao = $dao;
    }

    public function get_all(){
        return $this->dao->get_all();
    }

    public function get_latest(){
        return $this->dao->get_latest();
    }
    public function special_product(){
        return $this->dao->special_product();
    }

    public function featured_products(){
        return $this->dao->featured_products();
    }

    public function get_by_id($id){
        return $this->dao->get_by_id($id);
    }

    public function add($entity){
        return $this->dao->add($entity);
    }

    public function update($entity, $id){
        return $this->dao->update($entity, $id);
    }

    public function delete($id){
        return $this->dao->delete($id);
    }
}

?>