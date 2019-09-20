<?php
    class Article_model extends CI_Model{
        const TABLENAME = 'article';
        public function add($data){
            return $this->db->insert(self::TABLENAME, $data);
        }

        public function get(){
            $query = $this->db->get(self::TABLENAME);
            return $query->result_array();
        }

    }
?>