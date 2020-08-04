<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->ceksesi();
    }
    
    var $id_table       = 'id_doc';
    var $table          = 'shipment_doc' ;
    var $id_table_arr   = 'id_ship_arr';
    var $table_arr      = 'shipment_arrival';

    //dokumen kapal
    public function ajax_list(){
        $list = $this->shipment->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small"><a class="btn" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_doc."'".')">'.$r->seal_number.'</a>';
            $row[] = '<center style="font-size: small">'.$r->bl_number;
            $row[] = '<center style="font-size: small">'.$r->do_expire_date;
            $row[] = '<center style="font-size: small">'.$r->ship_name;
            $row[] = '<center style="font-size: small">'.$r->process_date;
            $row[] = '<center style="font-size: small">'.$r->arrival_date;
            $row[] = '<center style="font-size: small">'.$r->departure_date;
            $row[] = '<center style="font-size: small">'.$r->unload_load_date;
            $row[] = '<center style="font-size: small">'.$r->weight;
            $row[] = '<center style="font-size: small">'.$r->company;
            $row[] = '<center style="font-size: small">'.$r->agent;
            $row[] = '<center style="font-size: small">'.$r->origin_city;
            $row[] = '<center style="font-size: small">'.$r->shipper;
            $row[] = '<center style="font-size: small">'.$r->receiver;
            $row[] = '<center style="font-size: small">'.$r->product;

            $verif = $this->doring->verifDoc($r->id_doc);

            if($r->locked == '0'){
                $row[] = '<a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doc."'".')">D</a>
                        <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_doc."'".')">X</a>';
            }else{
                if($verif == TRUE){
                    $row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Verify" onclick="verify('."'".$r->id_doc."'".')">V</a>
                            <a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doc."'".')">D</a>
                            <input hidden id="locked'.$r->id_doc.'" value="'.$r->locked.'">';
                }else{
                    $row[] = '<a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doc."'".')">D</a>
                            <input hidden id="locked'.$r->id_doc.'" value="'.$r->locked.'">';
                }
                
            }
            
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->shipment->countAll(),
            "recordsFiltered" => $this->shipment->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
		$data       = $this->shipment->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $this->_validate();
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $seal_number        = $this->db->escape_str($post['no_seal']);
        $bl_number          = $this->db->escape_str($post['no_bl']);
        $do_expire_date     = $this->db->escape_str($post['do_expire_date']);
        $size               = $this->db->escape_str($post['size']);
        $process_date       = $this->db->escape_str($post['tgl_proses_dok']);
        $company            = $this->db->escape_str($post['cmpy']);
        $id_agent           = $this->db->escape_str($post['agen']);
        $ship_name          = $this->db->escape_str($post['ship_name']);
        $origin_city        = $this->db->escape_str($post['kota_asal']);
        $id_shipper         = $this->db->escape_str($post['pengirim']);
        $id_receiver        = $this->db->escape_str($post['penerima']);
        $io                 = $this->db->escape_str($post['io']);
        $condition          = $this->db->escape_str($post['kondisi']);
        $product            = $this->db->escape_str($post['produk']);
        $stuffing           = $this->db->escape_str($post['stuffing']);
        $td                 = $this->db->escape_str($post['td']);
        $weight             = $this->db->escape_str($post['berat']);
        $arrival_date       = $this->db->escape_str($post['tgl_tiba']);
        $unload_load_date   = $this->db->escape_str($post['tgl_bm']);

        $data = array(
            'seal_number'           => $seal_number,
            'bl_number'             => $bl_number,
            'do_expire_date'        => $do_expire_date,
            'size'                  => $size,
            'process_date'          => $process_date,
            'company'               => $company,
            'id_agent'              => $id_agent,
            'ship_name'             => $ship_name,
            'origin_city'           => $origin_city,
            'id_shipper'            => $id_shipper,
            'id_receiver'           => $id_receiver,
            'io'                    => $io,
            'condition'             => $condition,
            'product'               => $product,
            'stuffing'              => $stuffing,
            'departure_date'        => $td,
            'weight'                => $weight,
            'arrival_date'          => $arrival_date,
            'unload_load_date'      => $unload_load_date,
        );
        
        if($save == 'add'){
            if ($this->shipment->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->shipment->update_where($this->table ,array( $this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function delete($id){
        $this->shipment->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function confirm_doc($id){
        $this->shipment->confirmDoc($id);
        echo json_encode(array("status" => TRUE));
    }

    //dokumen tiap2 file
    public function ajax_edit_doc_table($id){
		$data = $this->shipment->getData($id);
		echo json_encode($data);
    }

    public function getCompany(){
        $data = $this->shipment->getCompany();
        echo json_encode($data);
    }

    public function getSeal(){
        $data = $this->shipment->getSeal();
        echo json_encode($data);
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

    //history data
    public function ajax_list_history(){
        $tgl_awal  = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $list = $this->shipment->get_datatable_history($tgl_awal,$tgl_akhir);
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->seal_number;
            $row[] = '<center style="font-size: small">'.$r->bl_number;
            $row[] = '<center style="font-size: small">'.$r->do_expire_date;
            $row[] = '<center style="font-size: small">'.$r->ship_name;
            $row[] = '<center style="font-size: small">'.$r->process_date;
            $row[] = '<center style="font-size: small">'.$r->arrival_date;
            $row[] = '<center style="font-size: small">'.$r->departure_date;
            $row[] = '<center style="font-size: small">'.$r->unload_load_date;
            $row[] = '<center style="font-size: small">'.$r->weight;
            $row[] = '<center style="font-size: small">'.$r->company;
            $row[] = '<center style="font-size: small">'.$r->agent;
            $row[] = '<center style="font-size: small">'.$r->origin_city;
            $row[] = '<center style="font-size: small">'.$r->shipper;
            $row[] = '<center style="font-size: small">'.$r->receiver;
            $row[] = '<center style="font-size: small">'.$r->product;

            $row[] = '<center><a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doc."'".')">D</a>';
           
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->shipment->countAll($tgl_awal,$tgl_akhir),
            "recordsFiltered" => $this->shipment->countFiltered($tgl_awal,$tgl_akhir),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
?>


