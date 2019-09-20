<?php
    class Fileitem_model extends CI_Model{
        const TABLENAME = 'fileitem';
        public function add($data){
            $this->db->insert(self::TABLENAME, $data);

            $gid=$this->db->insert_id(self::TABLENAME);
            return $gid;

        }
        public function get(){
            $query = $this->db->get(self::TABLENAME);
            return $query->result_array();
        }

    }
?>