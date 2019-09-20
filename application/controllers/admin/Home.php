<?php
class Home extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/admin_model');
        $this->load->model('admin/file_model');
        $this->load->model('admin/fileitem_model');
        $this->load->library('session');
        $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
        
    }
    public function index(){
        $admin= $this->session->userdata('admin');
        if(!$admin){
            redirect('admin/login/index');
        }else{
            $data =array();
            $where=array('file_status'=>0);
            $result = $this->file_model->getFile($where);
            if($result){
                $data['file']=$result;
            }else{
                $data['file']=array();
            }
            $res = $this->fileitem_model->get();

            if($res){
                $arr=array(array('name'=>'全部', 'id'=>'0'));
                foreach($res as $k=>$v){
                    array_push($arr,array('name'=>$v['fileItem_name'],'id'=>$v['fileItem_id']));
                    //$arr.push($v);  
                }

                $data['fileitem']= $arr;
            }else{
                $data['fileitem']=array(array('name'=>'全部', 'id'=>'0'));
            }
            
            $this->load->view('index',$data);
        }
    }
    public function addfileitem(){
        $admin= $this->session->userdata('admin');
        if(!$admin){
            redirect('admin/login/index');
        }else{
            if(IS_POST){
                $filename = $this->input->post('filename');
                $createTime = time();
                $add=array(
                    'fileitem_name'=>$filename,
                    'createTime' =>$createTime,
                );
                $res = $this->fileitem_model->add($add);
                if($res){
                    echo json_encode(array('code'=>1,'fileitem'=>array('name'=>$filename , 'id'=>$res)));
                }else{
                    echo json_encode(array('code'=>0));
                }
                

            }else{
                $this->load->view('index');
            }
        }
    }


}
?>