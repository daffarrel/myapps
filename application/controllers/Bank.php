<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {
    var $id_table   = 'idm_bank';
    var $table      = 'm_bank';

    public function ajax_list(){
        $list = $this->bank->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $bank) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$bank->bank_code;
            $row[] = '<center style="font-size: small">'.$bank->bank_name;
            //add html for action
            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$bank->idm_bank."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$bank->idm_bank."'".')">X</a>';
            
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bank->countAll(),
            "recordsFiltered" => $this->bank->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->bank->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id){
		$data = $this->bank->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $bank_code = $this->db->escape_str($post['bank_code']);
        $bank_name = $this->db->escape_str($post['bank_name']);

        $data = array(
            'bank_code'  => $bank_code,
            'bank_name' => $bank_name,
        );
        
        if($save == 'add'){
            if ($this->bank->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->bank->update_where($this->table ,array($this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function getData($id = ''){
        $data = $this->bank->getData($id);
        echo json_encode($data);
    }
}
?>
