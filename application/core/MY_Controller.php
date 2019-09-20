<?php
//后台控制器
class ADMIN_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //$this->load->admin_view();
    }

    public function getToken($data){
        //$this->load->helper('cookie');
		$array = array(
				"iat"=> time(),          // issued At签发时间
			    "exp"=> time()+3600*24*2,          // Expiration Time，过期时间
			    "nbf"=> time()+60,     //该时间之前不接收处理该Token
			    "iss"=> "John Wu JWT",        // Issuer，该JWT的签发者，个人理解随意定义
			    "aud"=> "localhost",    // Audience，该JWT的接收者，个人理解服务器标识，可以写你的域名
			    "uid"=> $data['admin_id'],//以下是用户id等信息，不要放敏感信息和太多信息，一般放用户id，和用户名
                "username"=> $data['username'],
                "key"=> $data['key']
			);
		//$secret  = 'localhost';
		$header  = base64_encode(json_encode(array('typ'=>'JWT','alg'=>'HS256')));
		$payload = base64_encode(json_encode($array));
		$token = $header.'.'.$payload.".".hash_hmac('sha256',$header.'.'.$payload,SECRET);
		//set_cookie('x-access-token',$token,7200);//将生成的token设置到cookie里
        return $token;
    }
    public function analysisToken($tokenStr){
        if(substr_count($tokenStr,'.')=='2'){
            $arr_token = explode('.',$tokenStr);
            list($header, $payload, $key)=$arr_token;
            $info = json_decode(base64_decode($payload));
            if(hash_hmac('sha256',$header.'.'.$payload,SECRET)==$key){
                $time=time();
                if($info->exp>$time){
                    return array('status'=>'1', 'info'=>$info);
                }else{
                    return array('status'=>'0', 'msg'=>'超时');
                }
            }else{
                return array('status'=>'0', 'msg'=>'验证失败');
            }
        }else{
            return array('status'=>'0', 'msg'=>'格式不正确');
        }
    }
    public function checkToken(){
        $headers = $this->input->request_headers();
        $tokenStr = $headers['Authorization'];
        $result = $this->analysisToken($tokenStr);
        if($result['status']=='1'){
            return true;
        }else{
            //return array('status'=>'0', 'msg'=>'');
             http_response_code(401);
             exit;
        }
    }
}
class pc_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //$this->load->admin_view();
    }
}

class web_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //$this->load->admin_view();
    }
}
?>