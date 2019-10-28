<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends MY_Controller{
    public function index(){
        $this->navmenu('Input Data Agent','add/vw_input_data_agent','','','');
    }

    public function edit($id){
        $data['agent'] = $this->agent->getData($id);
        $this->navmenu('Edit Data Agent','edit/vw_edit_data_agent','','',$data);
    }

    public function ajax_list(){
        $list = $this->agent->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $agent) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$agent->agent_name;
            $row[] = '<center style="font-size: small">'.$agent->address;
            $row[] = '<center style="font-size: small">'.$agent->telp;
            $row[] = '<center style="font-size: small">'.$agent->hp;
            $row[] = '<center style="font-size: small">'.$agent->fax;
            //$row[] = '<center style="font-size: small">'.$agent->fee;
            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$agent->idm_agent."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$agent->idm_agent."'".')">X</a>';
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->agent->countAll(),
            "recordsFiltered" => $this->agent->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->agent->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function addData() {
        $result = $this->agent->saveData($_POST);

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
        $id = $this->input->post('idm_agent');
        $result = $this->agent->updateData($_POST);

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

    public function getData($id = ''){
        $data = $this->agent->getData($id);
        echo json_encode($data);
    }
}
?>


