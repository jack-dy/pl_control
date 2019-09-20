<?php
    class Admin_model extends CI_Model{
        const TABLENAME = 'admin';
        public function login($data){
             $query = $this->db->where($data)->select(array('admin_id','nickname', 'key'))->get(self::TABLENAME);
             return $query->row();

        }

        public function update($data,$where){
            return $this->db->where($where)->update(self::TABLENAME,$data);
        }

    }
?>