<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->ceksesi();
    }

    var $id_table   = 'idm_agent';
    var $table      = 'm_agent';

    public function ajax_list(){
        $list = $this->agent->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $agent) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$agent->agent_name;
            $row[] = '<center style="font-size: small">'.$agent->address;
            $row[] = '<center style="font-size: small">'.$agent->telp;
            $row[] = '<center style="font-size: small">'.$agent->hp;
            $row[] = '<center style="font-size: small">'.$agent->fax;
            //$row[] = '<center style="font-size: small">'.$agent->fee;
            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$agent->idm_agent."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$agent->idm_agent."'".')">X</a>';
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->agent->countAll(),
            "recordsFiltered" => $this->agent->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
		$data       = $this->agent->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $agent_name = $this->db->escape_str($post['agent_name']);
        $address    = $this->db->escape_str($post['address']);
        $telp       = $this->db->escape_str($post['no_telp']);
        $hp         = $this->db->escape_str($post['no_hp']);
        $fax        = $this->db->escape_str($post['no_fax']);

        if("" == trim($post['address'])){
            $address = ' ';
        }
        if("" == trim($post['no_telp'])){
            $telp = ' ';
        }
        if("" == trim($post['no_hp'])){
            $hp = ' ';
        }
        if("" == trim($post['no_fax'])){
            $fax = ' ';
        }

        $data = array(
            'agent_name'    => $agent_name,
            'address'       => $address,
            'telp'          => $telp,
            'hp'            => $hp,
            'fax'           => $fax,
        );
        
        if($save == 'add'){
            if ($this->agent->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->agent->update_where($this->table ,array($this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function delete($id){
        $this->agent->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function getData($id = ''){
        $data = $this->agent->getData($id);
        echo json_encode($data);
    }
}
?>


