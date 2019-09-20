<?php
    class Uploadfile extends Admin_Controller{

      public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/file_model');
        $this->load->library('upload');
      }
      public function upload(){
        $file_item = $this->input->post('fileitem')=='0'?"":$this->input->post('fileitem');
        if($this->upload->do_upload('file')){
          $fileinfo=$this->upload->data();
          $name=$fileinfo['file_name'];
          $config_img['source_image']='./static/uploads/'.$name;
          $config_img['create_thumb'] = TRUE;
          $config_img['maintain_ratio'] = TRUE;
          $config_img['width']     = 100;
          $config_img['height']   = 100;
          $config_img['thumb_marker']='';
          $config_img['new_image']='./static/uploads/thumb';
          $time = time();
          if( strpos($fileinfo['file_type'], 'image') !== false){
            $this->load->library('image_lib', $config_img);
            $this->image_lib->resize();
          }
          // $this->load->library('image_lib', $config_img);
          // $this->image_lib->resize();
          //return $fileinfo;
          $insert=array(
            'file_name'=>$fileinfo['client_name'],
            'file_type'=>$fileinfo['file_type'],
            'file_size'=>$fileinfo['file_size'],
            'file_path'=>$file_item,
            'file_uptime'=>$time,
            'file_url'=>$fileinfo['file_name'],
            'file_status'=>0
          );
          $result =$this->file_model->add($insert);
          $file =array(
            'file_id'=>$result,
            'file_name'=>$fileinfo['client_name'],
            'file_type'=>$fileinfo['file_type'],
            'file_size'=>$fileinfo['file_size'],
            'file_path'=>$file_item,
            'file_uptime'=>$time,
            'file_url'=>$fileinfo['file_name'],
            'file_status'=>0
          );
          echo  json_encode(array('status'=>'1','file'=>$file));
        }else{
          //return 0;
          echo  json_encode(array('status'=>'0','err'=>$this->upload->display_errors()));
        }
      }
      public function t1(){
        $this->load->view('upload');
      }
      public function  test1(){
        if ( ! $this->upload->do_upload('file'))
        {
          
          $error = array('error' => $this->upload->display_errors());
          echo json_encode(array('code'=>'0','data'=>$error));
            //$this->load->view('upload_form', $error);
        }
        else
        {
          $fileinfo=$this->upload->data();
          $name=$fileinfo['file_name'];
          $config_img['source_image']='./static/uploads/'.$name;
          $config_img['create_thumb'] = TRUE;
          $config_img['maintain_ratio'] = TRUE;
          $config_img['width']     = 100;
          $config_img['height']   = 100;
          $config_img['thumb_marker']='';
          $config_img['new_image']='./static/uploads/thumb';
          $time = time();
          if( strpos($fileinfo['file_type'], 'image') !== false){
            $this->load->library('image_lib', $config_img);
            $this->image_lib->resize();
            
          }
          $data = array('upload_data' => $this->upload->data());
          echo json_encode(array('code'=>'1','data'=>$data));
            //$this->load->view('upload_success', $data);
        }


        // $file_item = $this->input->post('fileitem')=='0'?"":$this->input->post('fileitem');
        // if($this->upload->do_upload('file')){
        //   $fileinfo=$this->upload->data();
        //   $name=$fileinfo['file_name'];
        //   $config_img['source_image']='./static/uploads/'.$name;
        //   $config_img['create_thumb'] = TRUE;
        //   $config_img['maintain_ratio'] = TRUE;
        //   $config_img['width']     = 100;
        //   $config_img['height']   = 100;
        //   $config_img['thumb_marker']='';
        //   $config_img['new_image']='./static/uploads/thumb';
        //   $time = time();
        //   if( strpos($fileinfo['file_type'], 'image') !== false){
        //     $this->load->library('image_lib', $config_img);
        //     $this->image_lib->resize();
        //   }
        // }
      }
    // public function upfile(){
    //   if($this->upload->do_upload('file')){
    //     $fileinfo=$this->upload->data();
    //     $name=$fileinfo['file_name'];
    //     $config_img['source_image']='./static/uploads/'.$name;
    //     $config_img['create_thumb'] = TRUE;
    //     $config_img['maintain_ratio'] = TRUE;
    //     $config_img['width']     = 75;
    //     $config_img['height']   = 50;
    //     $config_img['thumb_marker']='';
    //     $config_img['new_image']='./static/uploads/thumb';
        
    //     $this->load->library('image_lib', $fileinfo);
    //     $this->image_lib->resize();
    //     return $fileinfo;

    //   }else{
    //     return 0;
    //   }
    // }
  }
?>