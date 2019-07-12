<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Truck extends MY_Controller{
    public function index(){
        $this->navmenu('Input Data Truk','add/vw_input_data_truk','','','');
    }

    public function edit($id){
        $data['truck'] = $this->truck->getData($id);
        $this->navmenu('Edit Data Kota','edit/vw_edit_data_truk','','',$data);
    }

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
            $row[] = '<center><a href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_truck."'".')"><i class="material-icons">launch</i></a>
                              <a href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_truck."'".')"><i class="material-icons">delete_forever</i></a>';

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

    public function delete($id){
        $this->truck->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function addData() {
        $result = $this->truck->saveData($_POST);

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
        $result = $this->truck->updateData($_POST);

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

    public function get_data($id){
        $result = $this->truck->get_data($id);
        echo json_encode($result);
    }
}
?>
