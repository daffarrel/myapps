<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment extends MY_Controller{
    public function index(){
        $data['shipper'] = $this->shipper->getAllData();
        $data['receiver'] = $this->receiver->getAllData();
        $data['container'] = $this->container->getAllData();
        $data['agent'] = $this->agent->getDataAll();
        $data['city'] = $this->city->getAllData();
        $data['company'] = $this->shipment->getCompany();
        $this->navmenu('Input Dokumen Kapal','add/vw_input_data_shipment_doc','','',$data);
    }

    public function edit($id){
        $data['shipper'] = $this->shipper->getAllData();
        $data['receiver'] = $this->receiver->getAllData();
        $data['container'] = $this->container->getAllData();
        $data['agent'] = $this->agent->getDataAll();
        $data['city'] = $this->city->getAllData();
        $data['company'] = $this->shipment->getCompany();
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
            $row[] = '<center style="font-size: small">'.$r->seal_number;
            $row[] = '<center style="font-size: small">'.$r->container_number;
            $row[] = '<center style="font-size: small">'.$r->ba_recv_date;
            $row[] = '<center style="font-size: small">'.$r->process_date;
            $row[] = '<center style="font-size: small">'.$r->company;
            $row[] = '<center style="font-size: small">'.$r->agent;
            $row[] = '<center style="font-size: small">'.$r->origin_city;
            $row[] = '<center style="font-size: small">'.$r->shipper;
            $row[] = '<center style="font-size: small">'.$r->receiver;
            $row[] = '<center style="font-size: small">'.$r->report_num;
            $row[] = '<center style="font-size: small">'.$r->safeconduct_num;
            $row[] = '<center style="font-size: small">'.$r->product;

            $row[] = '<center><a href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_doc."'".')"><i class="material-icons">launch</i></a>
                              <a href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_doc."'".')"><i class="material-icons">delete_forever</i></a>';
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
            $row[] = '<center style="font-size: small">'.$r->seal_number;
            $row[] = '<center style="font-size: small">'.$r->bl_number;
            $row[] = '<center style="font-size: small">'.$r->bl_date;
            $row[] = '<center style="font-size: small">'.$r->ship_name;
            $row[] = '<center style="font-size: small">'.$r->td;
            $row[] = '<center style="font-size: small">'.$r->weight;
            $row[] = '<center style="font-size: small">'.$r->arrival_date;
            $row[] = '<center style="font-size: small">'.$r->unload_load_date;

            $row[] = '<center><a href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_ship_arr."'".')"><i class="material-icons">launch</i></a>
                              <a href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_ship_arr."'".')"><i class="material-icons">delete_forever</i></a>';
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
                                                                    Data Berhasil Ditambahkan , <a href="javascript:void(0)" title="Kembali Ke Halaman Depan" onclick="cancel();"> Kembali...</a>
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
                                                                    Data Berhasil Di Update, <a href="javascript:void(0)" title="Kembali Ke Halaman Depan" onclick="cancel();"> Kembali...</a>
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
                                                                    Data Berhasil Ditambahkan , <a href="javascript:void(0)" title="Kembali Ke Halaman Depan" onclick="cancel();"> Kembali...</a>
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

    public function updateDataArr() {
        $id = $this->input->post('idm');
        $result = $this->shipment->updateDataArr($_POST);

        if ($result)
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> 
                                                                    Data Berhasil Di Update, <a href="javascript:void(0)" title="Kembali Ke Halaman Depan" onclick="cancel();"> Kembali...</a>
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
}
?>


