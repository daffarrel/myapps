<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->ceksesi();
        $this->cekAccess();
        $this->navmenu('Bill System','vw_home','','','');
    }

    public function master($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data ' . ucwords($title), 'data/vw_data_' . $page, '', '', '');
    }

    public function document($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu( 'Data '.ucwords($title),'data/vw_data_'.$page,'','','');
    }

    public function payment($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data '.ucwords($title),'data/vw_data_'.$page,'','','');
    }

    public function invoice($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data '.ucwords($title),'data/vw_data_'.$page,'','','');
    }

    public function report($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu('Laporan '.ucwords($title),'report/vw_report_'.$page,'','','');
    }

    public function history($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu('History Data '.ucwords($title),'history/vw_history_'.$page,'','','');
    }

    public function manage($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu('Data '.ucwords($title),'manage/vw_'.$page,'','','');
    }

    public function cost($page){
        $this->ceksesi();
        $this->cekAccess();
        $title = str_replace('_',' ',$page);
        $this->navmenu('Biaya '.ucwords($title),'cost/vw_cost_'.$page,'','','');
    }

    public function login(){
        $data['title']  = 'MyAPPS';
        $data['title2'] = 'My<b>APPS</b>';
        $this->load->view('manage/vw_login',$data,'');
    }

    public function error(){
        $data['title']  = 'MyAPPS';
        $data['title2'] = 'My<b>APPS</b>';
        $this->load->view('errors/vw_maintenance',$data,'');
    }

}
?>