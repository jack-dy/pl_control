<?php
    class File_model extends CI_Model{
        const TABLENAME = 'file';
        public function getFile($where){
             $query = $this->db->where($where)->get(self::TABLENAME);
             return $query->result_array();

        }
        public function add($data){
            $this->db->insert(self::TABLENAME, $data);
            $gid=$this->db->insert_id(self::TABLENAME);
            return $gid;

        }

    }
?>