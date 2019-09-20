<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
        
    }
	public function index()
	{
		echo '1';
	}
	
}
