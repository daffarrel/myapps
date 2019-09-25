<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller{
    public function index(){
        $this->navmenu('Input Data Kota','add/vw_input_data_city','','','');
    }

    public function edit($id){
        $data['city'] = $this->city->getData($id);
        $this->navmenu('Edit Data Kota','edit/vw_edit_data_city','','',$data);
    }

    public function ajax_list(){
        $list = $this->city->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $city) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$city->city_code;
            $row[] = '<center style="font-size: small">'.$city->city_name;
            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$city->idm_city."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$city->idm_city."'".')">X</a>';
            
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->city->countAll(),
            "recordsFiltered" => $this->city->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->city->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function addData() {
        $result = $this->city->saveData($_POST);

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
        $id = $this->input->post('idm_city');
        $result = $this->city->updateData($_POST);

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

    public function get_data($id){
        $result = $this->city->get_data($id);
        echo json_encode($result);
    }
}
?>
