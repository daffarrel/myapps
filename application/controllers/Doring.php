<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doring extends MY_Controller{
    var $id_table       = 'id_doring';
    var $table          = 'doring' ;
    var $id_table_doc   = 'id_doring_doc';
    var $table_doc      = 'doring_doc';

    public function ajax_list(){
        $list = $this->doring->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small"><a class="btn" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_doring."'".')">'.$r->seal_number.'</a>';
            $row[] = '<center style="font-size: small">'.$r->safeconduct_num;
            $row[] = '<center style="font-size: small">'.$r->route_name;
            $row[] = '<center style="font-size: small">'.$r->dk_lk;
            $row[] = '<center style="font-size: small">'.$r->on_chassis;
            $row[] = '<center style="font-size: small">'.$r->unload_date;
            $row[] = '<center style="font-size: small">'.$r->plate_number;
            $row[] = '<center style="font-size: small">'.$r->driver_name;

            $row[] = '<center><a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_doring."'".')">X</a>';
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doring->countAll(),
            "recordsFiltered" => $this->doring->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->doring->deleteData($id);
        $this->doring->updateLocked();
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id){
		$data       = $this->doring->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $this->_validate();
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $id_ship_arr       = $this->db->escape_str($post['no_seal']);
        $safeconduct_num   = $this->db->escape_str($post['no_surat_jalan']);
        $id_route          = $this->db->escape_str($post['rute']);
        $dk_lk             = $this->db->escape_str($post['dk_lk']);
        $on_chassis        = $this->db->escape_str($post['on_chassis']);
        $unload_date       = $this->db->escape_str($post['door']);
        $id_truck          = $this->db->escape_str($post['truck']);
        $id_driver         = $this->db->escape_str($post['supir']);

        $data = array(
            'id_ship_arr'      => $id_ship_arr,
            'safeconduct_num'  => $safeconduct_num,
            'id_route'         => $id_route,
            'dk_lk'            => $dk_lk,
            'on_chassis'       => $on_chassis,
            'unload_date'      => $unload_date,
            'id_truck'         => $id_truck,
            'id_driver'        => $id_driver,
        );
        
        if($save == 'add'){
            $status_locked = $this->shipment->updateLocked_arr($id_ship_arr);
            $this->shipment->updateLocked($status_locked);
            if ($this->doring->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->doring->update_where($this->table ,array( $this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    //doring_doc
    public function ajax_list_doc(){
        $list = $this->doring->get_datatable_doc();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->id_doring.'</a>';
            $row[] = '<center style="font-size: small"><a class="btn" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_doring_doc."'".')">'.$r->seal_number.'</a>';
            $row[] = '<center style="font-size: small">'.$r->BA;
            $row[] = '<center style="font-size: small">'.$r->SRT_JLN;
            $row[] = '<center style="font-size: small">'.$r->INS_KEN;
            $row[] = '<center style="font-size: small">'.$r->SHP_PNGRIM;
            $row[] = '<center style="font-size: small">'.$r->PO;
            $row[] = '<center style="font-size: small">'.$r->DO;
            $row[] = '<center style="font-size: small">'.$r->DELIV;
            $row[] = '<center style="font-size: small">'.$r->RCVING;
            $row[] = '<center style="font-size: small">'.$r->PP;
            $row[] = '<center style="font-size: small">'.$r->STRIP;
            $row[] = '<center style="font-size: small">'.$r->CNCL_LOAD;
            $row[] = '<center style="font-size: small">'.$r->CASHIER;
            $row[] = '<center style="font-size: small">'.$r->OTHER;

            $row[] = '<center><a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_doring_doc."'".')">X</a>';
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doring->countAll_doc(),
            "recordsFiltered" => $this->doring->countFiltered_doc(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete_doc($id){
        $this->doring->deleteData_doc($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit_doc($id){
		$data       = $this->doring->getData($id,$this->id_table_doc,$this->table_doc);
		echo json_encode($data);
    }

    public function ajax_save_doc(){
        $this->_validate_doc();
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $id_ship_arr       = $this->db->escape_str($post['no_seal']);
        $safeconduct_num   = $this->db->escape_str($post['no_surat_jalan']);
        $id_route          = $this->db->escape_str($post['rute']);
        $dk_lk             = $this->db->escape_str($post['dk_lk']);
        $on_chassis        = $this->db->escape_str($post['on_chassis']);
        $unload_date       = $this->db->escape_str($post['door']);
        $id_truck          = $this->db->escape_str($post['truck']);
        $id_driver         = $this->db->escape_str($post['supir']);

        $data = array(
            'id_ship_arr'      => $id_ship_arr,
            'safeconduct_num'  => $safeconduct_num,
            'id_route'         => $id_route,
            'dk_lk'            => $dk_lk,
            'on_chassis'       => $on_chassis,
            'unload_date'      => $unload_date,
            'id_truck'         => $id_truck,
            'id_driver'        => $id_driver,
        );
        
        if($save == 'add'){
            if ($this->doring->save_where($this->table_doc,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->doring->update_where($this->table_doc ,array( $this->id_table_doc => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    private function _validate_doc() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('no_seal') == NULL)
        {
            $data['inputerror'][] = 'no_seal';
            $data['error_string'][] = 'No Kontainer Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('no_seal') == NULL)
        {
            $data['inputerror'][] = 'no_seal';
            $data['error_string'][] = 'No Kontainer Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}
?>


