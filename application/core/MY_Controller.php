<?php
//error_reporting(0);
//ini_set('display_errors', 0);
if (isset($_SERVER["HTTP_ORIGIN"]) === true) {
	$origin = $_SERVER["HTTP_ORIGIN"];
	$allowed_origins = array(
		"http://localhost/simpers",
        "https://localhost/simpers",
        "http://192.168.19.21/simpers",
        "https://192.168.19.21/simpers",
        "http://dev.kkt/simpers",
        "https://dev.kkt/simpers"
	);
	if (in_array($origin, $allowed_origins, true) === true) {
		header('Access-Control-Allow-Origin: ' . $origin);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Allow-Headers: Content-Type');
	}
	if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
		exit; // OPTIONS request wants only the policy, we can stop here
	}
}

date_default_timezone_set("Asia/Makassar");
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $md5_key = '##';

    public function __construct() {
        parent::__construct();
        $this->load->model('M_bank', 'bank');
        $this->load->model('M_city', 'city');
        $this->load->model('M_agent', 'agent');
        $this->load->model('M_driver', 'driver');
        $this->load->model('M_receiver', 'receiver');
        $this->load->model('M_route', 'route');
        $this->load->model('M_shipper', 'shipper');
        $this->load->model('M_truck', 'truck');
        $this->load->model('M_shipment', 'shipment');
        $this->load->model('M_doring', 'doring');
        $this->load->model('M_document', 'document');
        $this->load->model('M_cost', 'cost');
        $this->load->model('M_admin', 'admin');
        $this->load->model('M_menu', 'menu');
        $this->load->model('M_role', 'role');
    }

    function indonesian_date ($date_format = 'D, j-M-Y',$timestamp = '', $suffix = '') {
        if (trim ($timestamp) == '')
        {
            $timestamp = time ();
        }
        elseif (!ctype_digit ($timestamp))
        {
            $timestamp = strtotime ($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace ("/S/", "", $date_format);
        $pattern = array (
            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
            '/April/','/June/','/July/','/August/','/September/','/October/',
            '/November/','/December/',
        );
        $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
            'Jan ','Feb ','Mar ','Apr ','Mei ','Jun ','Jul ','Ags ','Sep ','Okt ','Nov ','Des ',
            'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
            'Oktober','November','Desember',
        );
        $date = date ($date_format, $timestamp);
        $date = preg_replace ($pattern, $replace, $date);
        $date = "{$date} {$suffix}";

        return $date;
    }

    function rupiah($angka){
        //$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
    }

    public function navmenu($title,$page,$err='',$info='',$attr=''){
        $data['title']=$title;
        $data['err']=$err;
        $data['info']=$info;
        $data['attr']=$attr;
        $this->load->template($page,$data);
    }

    public function ceksesi(){
        if($this->session->has_userdata('status','email','password')){
            $uid    = $_SESSION['email'];
            $sesi   = $_SESSION['password'];
            $result = $this->_cekUser($uid,$sesi);
            
            if ($result['status'] == FALSE) {
                $data = array(
                    'status',
                    'email',
                    'password',
                    'name',
                    'role',
                    'image',
                    'created_date',
                );
                $this->session->unset_userdata($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your Session Has Ended</div>');
                redirect('main/login');
            }
        }else{
            $this->session->unset_userdata($data);
            //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your Session Has Ended</div>');
            redirect('main/login');
        }
    }

    public function cekAccess(){
        $role   = $_SESSION['role'];
        $menu   = $this->uri->segment(2).'/'.$this->uri->segment(3);
        $menuID = $this->menu->getMenuID($menu);
        $access = $this->_cekUserAccess($role,$menuID);

        if($menu == '/'){
            //do nothing
        }else if($access['status'] == FALSE){
            redirect('main/error');
        }else{
            //do nothing
        }
    }

    private function _cekUser($uid,$sesi){
        $result = $this->admin->cekSesi($uid,$sesi);
        return $result;
    }

    private function _cekUserAccess($role,$menu){
        $result = $this->admin->cekUserAccess($role,$menu);
        return $result;
    }

    function singleUpload($upload_name,$folder,$filename){
        if(!is_dir('./dokumen/'.$folder)){
            mkdir('./dokumen/'.$folder,0775,true);
        }

        // $config['file_name'] = $user_name.date('YmdHis').".".$extension;
        $config['file_name']     = $filename;
        $config['allowed_types'] = 'pdf|png|jpg|jpeg|bmp';
        $config['upload_path']   = 'dokumen/'.$folder."/";

        $this->upload->initialize($config);

        if ($this->upload->do_upload($upload_name)){
            $arrayRetutn['upload'] = 'True';
            $arrayRetutn['data'] = $this->upload->data();
        } else {
            $arrayRetutn['upload'] = 'False';
            $arrayRetutn['error'] = $this->upload->display_errors();
        }
        //echo '<pre>';print_r($arrayRetutn);echo '</pre>'; die;
        return $arrayRetutn;
    }

    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }

    public function Romawi($angka) {
        $hsl = "";
        if ($angka < 1 || $angka > 5000) {
            // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
            $hsl = "Batas Angka 1 s/d 5000";
        } else {
            while ($angka >= 1000) {
                // While itu termasuk kedalam statement perulangan
                // Jadi misal variable angka lebih dari sama dengan 1000
                // Kondisi ini akan di jalankan
                $hsl .= "M";
                // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
                // Varible hsl
                $angka -= 1000;
                // Lalu setelah itu varible angka di kurangi 1000 ,
                // Kenapa di kurangi
                // Karena statment ini mengambil 1000 untuk di konversi menjadi M
            }
        }
        if ($angka >= 500) {
            // statement di atas akan bernilai true / benar
            // Jika var angka lebih dari sama dengan 500
            if ($angka > 500) {
                if ($angka >= 900) {
                    $hsl .= "CM";
                    $angka -= 900;
                } else {
                    $hsl .= "D";
                    $angka-=500;
                }
            }
        }
        while ($angka>=100) {
            if ($angka>=400) {
                $hsl .= "CD";
                $angka -= 400;
            } else {
                $angka -= 100;
            }
        }
        if ($angka>=50) {
            if ($angka>=90) {
                $hsl .= "XC";
                $angka -= 90;
            } else {
                $hsl .= "L";
                $angka-=50;
            }
        }
        while ($angka >= 10) {
            if ($angka >= 40) {
                $hsl .= "XL";
                $angka -= 40;
            } else {
                $hsl .= "X";
                $angka -= 10;
            }
        }
        if ($angka >= 5) {
            if ($angka == 9) {
                $hsl .= "IX";
                $angka-=9;
            } else {
                $hsl .= "V";
                $angka -= 5;
            }
        }
        while ($angka >= 1) {
            if ($angka == 4) {
                $hsl .= "IV";
                $angka -= 4;
            } else {
                $hsl .= "I";
                $angka -= 1;
            }
        }
        return ($hsl);
    }
}
?>