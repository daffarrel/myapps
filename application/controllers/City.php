<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->ceksesi();
    }

    var $id_table   = 'idm_city';
    var $table      = 'm_city';

    public function ajax_list(){
        $list = $this->city->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $city) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$city->city_code;
            $row[] = '<center style="font-size: small">'.$city->city_name;
            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$city->idm_city."'".')">E</a>
                        <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$city->idm_city."'".')">X</a>';
            
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->city->countAll(),
            "recordsFiltered" => $this->city->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->city->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id){
		$data = $this->city->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $city_code = $this->db->escape_str($post['city_code']);
        $city_name = $this->db->escape_str($post['city_name']);

        $data = array(
            'city_code' => $city_code,
            'city_name' => $city_name,
        );
        
        if($save == 'add'){
            if ($this->city->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->city->update_where($this->table ,array($this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function getData($id = ''){
        $result = $this->city->getData($id);
        echo json_encode($result);
    }
}
?>
