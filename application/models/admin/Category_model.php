<?php
    class Category_model extends CI_Model{
        const TABLENAME = 'category';
        public function total(){
            // $sql="select count(id) as num from ".$this->db->dbprefix(self::TABLENAME) group by id;
            //$query = $this->db->get(self::TABLENAME);
            //return $this->db->count_all() ;
            return $this->db->count_all_results(self::TABLENAME);

        }
        public function loadmore($page,$size){
            $query=$this->db->order_by('category_id')->limit($size,$page)->get(self::TABLENAME);
            $list= $query->result_array();
            $total = $this->db->count_all_results(self::TABLENAME);
            $data = array('list'=>$list, 'total'=>$total);
            return $data;
        }

        public function detail($id){
            $query=$this->db->where(array('category_id'=>$id))->get(self::TABLENAME);
            $list = $query->row_array();
            $data = array('list'=>$list);
            return $data;
        }
        public function update($data,$where){
            return  $this->db->where($where)->update(self::TABLENAME,$data);
        }

        public function add($data){
            return $this->db->insert(self::TABLENAME, $data);
        }

    }
?>