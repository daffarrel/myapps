<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends MY_Controller{
    public function index(){
        $data['tipe'] = $this->route->getOptionData('truck');
        $data['size'] = $this->route->getOptionData('size');;
        $this->navmenu('Input Data Rute','add/vw_input_data_route','','',$data);
    }

    public function edit($id){
        $data['data'] = $this->route->getData($id);
        $this->navmenu('Edit Data Rute','edit/vw_edit_data_route','','',$data);
    }

    public function ajax_list(){
        $list = $this->route->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->route_name;
            $row[] = '<center style="font-size: small">'.$r->origin;
            $row[] = '<center style="font-size: small">'.$r->destination;
            $row[] = '<center style="font-size: small">'.$r->type;
            $row[] = '<center style="font-size: small">'.$r->ukuran;
            $row[] = '<center style="font-size: small">'.$r->fare;

            $row[] = '<center><a href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_route."'".')"><i class="material-icons">launch</i></a>
                              <a href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_route."'".')"><i class="material-icons">delete_forever</i></a>';
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->route->countAll(),
            "recordsFiltered" => $this->route->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->route->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function addData() {
        $result = $this->route->saveData($_POST);

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
        $result = $this->route->updateData($_POST);

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


