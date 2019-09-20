<?php
class Category extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/admin_model');
        $this->load->model('admin/category_model');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
        
    }
    public function addorUpdate(){
        if(IS_POST){
            $this->checkToken();
            $content = file_get_contents('php://input');
            $post    = (array)json_decode($content, true);
            if(isset($post['category_id'])){
                $where=array(
                    'category_id'=>$post['category_id']
                );
                $data=array(
                    'name'=>$post['name'],
                    'sort'=>$post['sort']
                );
                $this->category_model->update($data,$where);
                echo json_encode(array('code'=>1));
            }else{
                $data=array(
                    'name'=>$post['name'],
                    'sort'=>$post['sort'],
                    'create_time'=>time()
                );
                $this->category_model->add($data);
                echo json_encode(array('code'=>1));
            }
            
        }else{
            echo json_encode(array('code'=>0));
        }
    }

    public function detail(){
        if(IS_GET){
            $this->checkToken();
            $id= $this->input->get('id');
            $data =$this->category_model->detail($id);
            echo json_encode(array('code'=>1,'data'=>$data));
        }else{
            echo json_encode(array('code'=>0));
        }
    }

    public function loadmore(){
        if(IS_GET){
            $this->checkToken();
            $page= $this->input->get('page');
            $size= $this->input->get('size');
            if($page==0 || $size==0){
                $page=1;
                $size=5; 
            }
            //$total = get_cookie('total');

            $data =$this->category_model->loadmore($page-1,$size);
            echo json_encode(array('code'=>1,'data'=>$data));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
}
?>