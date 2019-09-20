<?php
    class Course_model extends CI_Model{
        const TABLENAME = 'course';
        public function total(){
            // $sql="select count(id) as num from ".$this->db->dbprefix(self::TABLENAME) group by id;
            $this->db->get(self::TABLENAME);
            return $this->db->count_all() ;
             //return $query->row();

        }
        public function detail($id){
            $query=$this->db->where(array('id'=>$id))->get(self::TABLENAME);
            return $query->row_array();
        }

        public function loadmore($page,$size){
            $query=$this->db->order_by('id')->limit($size,$page)->get(self::TABLENAME);
            return $query->result_array();
        }

        public function update($data,$where){
            return  $this->db->where($where)->update(self::TABLENAME,$data);
        }

        public function add($data){
            return $this->db->insert(self::TABLENAME, $data);
        }

        public function delete($where){
            $query = $this->db->delete(self::TABLENAME,$where);
        }

    }
?>