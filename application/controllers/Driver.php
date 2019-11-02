<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends MY_Controller{
    var $id_table   = 'idm_driver';
    var $table      = 'm_driver';

    public function ajax_list(){
        $list = $this->driver->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->driver_name;
            $row[] = '<center style="font-size: small">'.$r->license_number;
            $row[] = '<center style="font-size: small">'.$r->dob_city."/".$r->dob;
            $row[] = '<center style="font-size: small">'.$r->address;

            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_driver."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_driver."'".')">X</a>';
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->driver->countAll(),
            "recordsFiltered" => $this->driver->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->driver->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id){
		$data = $this->driver->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $driver_name    = $this->db->escape_str($post['nama_supir']);
        $license_num    = $this->db->escape_str($post['no_sim']);
        $dob            = $this->db->escape_str($post['tgl_lahir']);
        $dob_city       = $this->db->escape_str($post['tmpt_lahir']);
        $address        = $this->db->escape_str($post['alamat']);

        $data = array(
            'driver_name'       => $driver_name,
            'license_number'    => $license_num,
            'dob'               => $dob,
            'dob_city'          => $dob_city,
            'address'           => $address
        );
        
        if($save == 'add'){
            if ($this->driver->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->driver->update_where($this->table ,array($this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function getData($id = ''){
        $result = $this->driver->getData($id);
        echo json_encode($result);
    }
}
?>


