<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->navmenu('Bill System','vw_home','','','');
    }

    public function master($page){
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data ' . ucwords($title), 'data/vw_data_' . $page, '', '', '');
    }

    public function document($page){
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data '.ucwords($title),'data/vw_data_'.$page,'','','');
    }

    public function payment($page){
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data '.ucwords($title),'data/vw_data_'.$page,'','','');
    }

    public function invoice($page){
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data '.ucwords($title),'data/vw_data_'.$page,'','','');
    }

    public function login(){
        $data['title'] = 'Login';
        $this->load->view('vw_login',$data,'');
    }

}
?>