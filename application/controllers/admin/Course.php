<?php
class Course extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/admin_model');
         $this->load->model('admin/course_model');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
        
    }
    public function loadmore(){
        if(IS_GET){
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){

                //$content = file_get_contents('php://input');
                //$post    = (array)json_decode($content, true);
                // $page =intval($this->uri->segment(4));
                // $size =$this->uri->segment(5);
                $page= $this->input->get('page');
                $size= $this->input->get('size');
                if($page==0 || $size==0){
                    $page=1;
                    $size=5; 
                }
                $total = get_cookie('total');
                    if($total!=null){
                        //echo json_encode(array('code'=>'1','data'=>$total,'num'=>$num));
                    }else{
                        $num=$this->course_model->total();
                        set_cookie("total",$num, 3600*2);
                        $total =$num;
                    }
                    $res=$this->course_model->loadmore($page-1,$size);
                    echo json_encode(array('code'=>'1','data'=>array('list'=>$res,'total'=>$total)));

                //$res=$this->course_model->total();
            }else{
                http_response_code(401);
                exit;
            }
        }else{
            echo json_encode(array('code'=>'0', 'msg'=>'提交方式错误'));
        }
    }
    public function detail(){
        if(IS_GET){
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){
                $id= $this->input->get('id');
                $res=$this->course_model->detail($id);
                echo json_encode(array('code'=>'1','data'=>array('list'=>$res)));
            }else{
                http_response_code(401);
                exit;
            }
        }else{
            echo json_encode(array('code'=>'0', 'msg'=>'提交方式错误'));
        }
    }


    public function loadmore2(){
        if(IS_GET){
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){

                $content = file_get_contents('php://input');
                $post    = (array)json_decode($content, true);
                // $page =$post['page'];
                // $size =$post['size'];
                $page= $this->input->get('page');
                $size= $this->input->get('size');
                // $page =intval($this->uri->segment(4));
                // $size =$this->uri->segment(5);
                if($page>0 && $size>0){
                    
                   
                }else{
                    $page=1;
                    $size=5; 
                }
                $total = get_cookie('total');

                    if($total!=null){
                        //echo json_encode(array('code'=>'1','data'=>$total,'num'=>$num));
                    }else{
                        $num=$this->course_model->total();
                        set_cookie("total",$num, 3600*2);
                        $total =$num;
                    }
                    $res=$this->course_model->loadmore($page-1,$size);
                    echo json_encode(array('code'=>'1','data'=>array('list'=>$res,'total'=>$total)));

                //$res=$this->course_model->total();
            }else{
                http_response_code(401);
                exit;
            }
        }else{
            echo json_encode(array('code'=>'0', 'msg'=>'提交方式错误'));
        }
    }

    public function updatename(){
        if(IS_POST){
            
            $content = file_get_contents('php://input');
            $post    = (array)json_decode($content, true);
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){
                // $id =$this->input->post('id');
                // $name =$this->input->post('name');
                $id = $post['id'];
                $name=$post['name'];
                $where = array(
                    'id'=>$id
                );
                $data=array(
                    'name'=>$name
                );
                $res = $this->course_model->update($data,$where);
               if($res){
                echo json_encode(array('code'=>'1','msg'=>'修改成功','data'=>$data,'where'=>$where));
               }else{
                echo json_encode(array('code'=>'0','msg'=>'修改失败'));
               }
            }else{
                http_response_code(401);
                exit;
            }
        }else{
            echo json_encode(array('code'=>'0', 'msg'=>'提交方式错误'));
        }
    }

    public function deleteCourse(){
        if(IS_POST){
            $content = file_get_contents('php://input');
            $post    = (array)json_decode($content, true);
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){
                $where=array(
                    'id'=>$post['id']
                );
                $this->course_model->delete($where);
                echo json_encode(array('code'=>1));               
            }else{
                http_response_code(401);
                exit;
            }
        }else{
            echo json_encode(array('code'=>'0', 'msg'=>'提交方式错误'));
        }
    }

    public function update(){
        if(IS_POST){
            $content = file_get_contents('php://input');
            $post    = (array)json_decode($content, true);
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){
               $where=array(
                   'id'=>$post['id']
               );
               $data=array(
                   'name'=>$post['name'],
                   'level'=>$post['level'],
                   'type'=>$post['type'],
                   'num'=>$post['num'],
                   'date'=>$post['date'],
               );
               $res = $this->course_model->update($data,$where);
               if($res){
                echo json_encode(array('code'=>'1','msg'=>'修改成功'));
               }else{
                echo json_encode(array('code'=>'0','msg'=>'修改失败'));
               }
               

            }else{
                http_response_code(401);
                exit;
            }
        }else{
            echo json_encode(array('code'=>'0', 'msg'=>'提交方式错误'));
        } 
    }

    public function addOrUpdate(){
        if(IS_POST){
            $content = file_get_contents('php://input');
            $post    = (array)json_decode($content, true);
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){

                $date= isset($post['date'])?$post['date']:'';
                $level= isset($post['level'])?$post['level']:'';
                $type= isset($post['type'])?$post['type']:'';
                $content= $post['content'];
                $image_url= $post['image_url'];
                $name= $post['name'];
                $data = array(
                    'name'=>$name,
                    'image_url'=>$image_url,
                    'content'=>$content,
                    'type'=>$type,
                    'level'=>$level,
                    'date'=>$date
                );
                if(isset($post['id'])){
                    $where=array(
                        'id'=>$post['id']
                    );
                    $res = $this->course_model->update($data,$where);
                }else{
                    $res = $this->course_model->add($data);
                }
                echo json_encode(array('code'=>'1','data'=>$data));
            //    $where=array(
            //        'id'=>$post['id']
            //    );
            //    $data=array(
            //        'name'=>$post['name'],
            //        'level'=>$post['level'],
            //        'type'=>$post['type'],
            //        'num'=>$post['num'],
            //        'date'=>$post['date'],
            //    );
            //    $res = $this->course_model->update($data,$where);
            //    if($res){
            //     echo json_encode(array('code'=>'1','msg'=>'修改成功'));
            //    }else{
            //     echo json_encode(array('code'=>'0','msg'=>'修改失败'));
            //    }
               

            }else{
                http_response_code(401);
                exit;
            } 
        }
    }

}
?>