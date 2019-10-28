<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment extends MY_Controller{
    public function index(){
        $this->navmenu('Input Dokumen Kapal','add/vw_input_data_shipment_doc','','',$data);
    }

    public function edit($id){
        $data['data'] = $this->shipment->getData($id);
        $this->navmenu('Edit Dokumen Kapal','edit/vw_edit_data_shipment_doc','','',$data);
    }

    public function arr_index(){
        $data['seal'] = $this->shipment->getSeal();
        $this->navmenu('Input Dokumen Kapal Datang','add/vw_input_data_shipment_arr','','',$data);
    }

    public function arr_edit($id){
        $data['seal'] = $this->shipment->getSeal();
        $data['data'] = $this->shipment->getDataArr($id);
        $this->navmenu('Edit Dokumen Kapal Datang','edit/vw_edit_data_shipment_arr','','',$data);
    }

    public function delete_arr($id){
        $this->shipment->deleteDataArr($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_list(){
        $list = $this->shipment->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small"><a class="btn" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_doc."'".')">'.$r->seal_number.'</a>';
            $row[] = '<center style="font-size: small">'.$r->ship_name;
            $row[] = '<center style="font-size: small">'.$r->process_date;
            $row[] = '<center style="font-size: small">'.$r->ship_arrival_date;
            $row[] = '<center style="font-size: small">'.$r->company;
            $row[] = '<center style="font-size: small">'.$r->agent;
            $row[] = '<center style="font-size: small">'.$r->origin_city;
            $row[] = '<center style="font-size: small">'.$r->shipper;
            $row[] = '<center style="font-size: small">'.$r->receiver;
            $row[] = '<center style="font-size: small">'.$r->product;

            $row[] = '<a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doc."'".')">D</a>
            <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_doc."'".')">X</a>';

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

    public function ajax_list_arr(){
        $list = $this->shipment->get_datatable_arr();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small"><a class="btn" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_ship_arr."'".')">'.$r->seal_number.'</a>';
            $row[] = '<center style="font-size: small">'.$r->bl_number;
            $row[] = '<center style="font-size: small">'.$r->bl_date;
            $row[] = '<center style="font-size: small">'.$r->ship_name;
            $row[] = '<center style="font-size: small">'.$r->td;
            $row[] = '<center style="font-size: small">'.$r->weight;
            $row[] = '<center style="font-size: small">'.$r->arrival_date;
            $row[] = '<center style="font-size: small">'.$r->unload_load_date;

            $row[] = '<center><a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_ship_arr."'".')">X</a>';

            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->shipment->countAllArr(),
            "recordsFiltered" => $this->shipment->countFilteredArr(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->shipment->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function addData() {
        $result = $this->shipment->saveData($_POST);

        if ($result)
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> 
                                                                    Data Berhasil Ditambahkan
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>');
        else
            $this->session->set_flashdata('notif',
                '<div class="alert alert-danger" role="alert"> Data Gagal Ditambahkan..Silahkan Periksa Kembali Inputan Anda 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                       </div>');

        $this->index();
    }

    public function updateData() {
        $id = $this->input->post('idm');
        $result = $this->shipment->updateData($_POST);

        if ($result)
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> 
                                                                    Data Berhasil Di Update
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>');
        else
            $this->session->set_flashdata('notif',
                '<div class="alert alert-danger" role="alert"> Data Gagal Di Update..Silahkan Periksa Kembali Inputan Anda 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                       </div>');

        $this->edit($id);
    }

    public function deleteArr($id){
        $this->shipment->deleteDataArr($id);
        echo json_encode(array("status" => TRUE));
    }

    public function addDataArr() {
        $result = $this->shipment->saveDataArr($_POST);

        if ($result)
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> 
                                                                    Data Berhasil Ditambahkan
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>');
        else
            $this->session->set_flashdata('notif',
                '<div class="alert alert-danger" role="alert"> Data Gagal Ditambahkan..Silahkan Periksa Kembali Inputan Anda 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                       </div>');

        $this->arr_index();
    }

    public function updateDataArr() {
        $id = $this->input->post('idm');
        $result = $this->shipment->updateDataArr($_POST);

        if ($result)
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> 
                                                                    Data Berhasil Di Update
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>');
        else
            $this->session->set_flashdata('notif',
                '<div class="alert alert-danger" role="alert"> Data Gagal Di Update..Silahkan Periksa Kembali Inputan Anda 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                       </div>');

        $this->arr_edit($id);
    }

    public function ajax_edit_doc_table($id){
		$data = $this->shipment->getData($id);
		echo json_encode($data);
    }

    public function ajax_edit($id){
		$data = $this->shipment->getData($id,'id_doc','shipment_doc');
		echo json_encode($data);
    }

    public function save(){
        $table = 'shipment_doc';
        $save  = $this->input->post('save_method');
        $post  = $_POST;

        $seal_number        = $this->db->escape_str($post['no_seal']);
        $size               = $this->db->escape_str($post['size']);
        $process_date       = $this->db->escape_str($post['tgl_proses_dok']);
        $company            = $this->db->escape_str($post['cmpy']);
        $id_agent           = $this->db->escape_str($post['agen']);
        $ship_name          = $this->db->escape_str($post['nama_kapal']);
        $origin_city        = $this->db->escape_str($post['kota_asal']);
        $id_shipper         = $this->db->escape_str($post['pengirim']);
        $id_receiver        = $this->db->escape_str($post['penerima']);
        $io                 = $this->db->escape_str($post['io']);
        $condition          = $this->db->escape_str($post['kondisi']);
        $product            = $this->db->escape_str($post['produk']);
        $stuffing           = $this->db->escape_str($post['stuffing']);

        $data = array(
            'seal_number'           => $seal_number,
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
        );
        
        if($save == 'add'){
            if ($this->shipment->save_where($table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->shipment->update_where($table ,array('id_doc' => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function getCompany(){
        $data = $this->shipment->getCompany();
        echo json_encode($data);
    }
}
?>


