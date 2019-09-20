<?php
class User extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/admin_model');
        $this->load->library('session');
        $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
        
    }

    public function login(){
        if(IS_POST){
            $content = file_get_contents('php://input');
            $post    = (array)json_decode($content, true);
            $data =array(
                'user'=>$post['username'],
                'password'=>md5($post['password'])
            );
            
            $result = $this->admin_model->login($data);
            if($result){
                $time=time();
                $token_arr=array(
                    'admin_id'=>$result->admin_id,
                    'username'=>$result->nickname,
                    'key'=>$result->key
                );
                $token = $this->getToken($token_arr);
                $updata=array(
                    'token'=>$token,
                    'update_time'=>$time
                );
                $where=array(
                    'admin_id'=>$result->admin_id
                );
                $res = $this->admin_model->update($updata,$where);
                 echo json_encode(array('code'=>'1','data'=>$data,'token'=>$token));
            }else{
                echo json_encode(array('code'=>'0','msg'=>'登陆失败'));
            }
        }else{
            echo json_encode(array('code'=>'0','msg'=>'请正确登陆'));
        }
    }

    public function changePassword(){
        if(IS_POST){
            $content = file_get_contents('php://input');
            $post    = (array)json_decode($content, true);
            $headers = $this->input->request_headers();
            $tokenStr = $headers['Authorization'];
            $result = $this->analysisToken($tokenStr);
            if($result['status']=='1'){
                //echo json_encode(array('code'=>1));
                $data=array(
                    'password'=>md5($post['password'])
                );
                $where=array(
                    'admin_id'=>$result['info']->uid
                );
                $res=$this->admin_model->update($data,$where);
                if($res){
                    echo json_encode(array('code'=>1));
                }else{
                    echo json_encode(array('code'=>0));
                }
               
            }else{
                http_response_code(401);
                exit;
                //echo json_encode(array('code'=>-1,'msg'=>$result['msg']));
            }
            // echo json_encode(array('code'=>1,'data'=>$result));
            
        }else{
            echo json_encode(array('code'=>0));
        }
    }
}
?>