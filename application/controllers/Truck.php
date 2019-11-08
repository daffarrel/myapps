<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Truck extends MY_Controller{
    var $id_table   = 'idm_truck';
    var $table      = 'm_truck';

    public function ajax_list(){
        $list = $this->truck->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->truck_code;
            $row[] = '<center style="font-size: small">'.$r->plate_number;
            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_truck."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_truck."'".')">X</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->truck->countAll(),
            "recordsFiltered" => $this->truck->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
		$data = $this->truck->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $truck_code     = $this->db->escape_str($post['kode_truk']);
        $plate_number   = $this->db->escape_str($post['no_polisi']);

        $data = array(
            'truck_code'    => $truck_code,
            'plate_number'  => $plate_number,
        );

        if($save == 'add'){
            if ($this->truck->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->truck->update_where($this->table ,array($this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function delete($id){
        $this->truck->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function getData($id = ''){
        $result = $this->truck->getData($id);
        echo json_encode($result);
    }
}
?>
