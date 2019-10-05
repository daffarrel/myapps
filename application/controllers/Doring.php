<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doring extends MY_Controller{
    public function index(){
        $data['seal']   = $this->shipment->getSealNumber();
        $data['supir']  = $this->driver->getDriver();
        $data['truck']  = $this->truck->getTruck();
        $data['rute']   = $this->route->getRoute();
        $this->navmenu('Input Data Doring','add/vw_input_data_doring','','',$data);
    }

    public function edit($id){
        $data['seal']   = $this->shipment->getSealNumber();
        $data['supir']  = $this->driver->getDriver();
        $data['truck']  = $this->truck->getTruck();
        $data['rute']   = $this->route->getRoute();
        $data['data']   = $this->doring->getData($id);
        $this->navmenu('Edit Data Doring','edit/vw_edit_data_doring','','',$data);
    }

    public function ajax_list(){
        $list = $this->doring->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small"><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_doring."'".')">'.$r->seal_number.'</a>';
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
        echo json_encode(array("status" => TRUE));
    }

    public function addData() {
        $result = $this->doring->saveData($_POST);

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
        $result = $this->doring->updateData($_POST);

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
}
?>


