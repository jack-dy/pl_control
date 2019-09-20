<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Article extends CI_Controller {
//     public function __construct(){
//         parent::__construct();
//         $this->load->database();
//         $this->load->model('article_model');
//         $this->load->library('session');
//         $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
        
//     }
// 	public function get()
// 	{
//         $res = $this->article_model->get();
//         if($res){
//             echo json_encode(array('code'=>'1','data'=>$res));
//         }else{
//             echo json_encode(array('code'=>'0'));
//         }
// 	}
// 	public function add(){
//         $content = file_get_contents('php://input');
//         $post    = (array)json_decode($content, true);
//         $data=array();
//         $data['article_title']=$post['title'];
//         $data['article_content']=$post['content'];
//         $data['article_categories']=implode(",",$post['categories']);
//         $res = $this->article_model->add($data);
//         if($res){
//             echo json_encode(array('code'=>'1'));
//         }else{
//             echo json_encode(array('code'=>'0'));
//         }


// 	}
// }
