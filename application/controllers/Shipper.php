<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipper extends MY_Controller{
    public function index(){
        $data['bank'] = $this->bank->getDataAll();
        $this->navmenu('Input Data Pengirim','add/vw_input_data_shipper','','',$data);
    }

    public function edit($id){
        $data['bank'] = $this->bank->getDataAll();
        $data['data'] = $this->shipper->getData($id);
        $this->navmenu('Edit Data Pengirim','edit/vw_edit_data_shipper','','',$data);
    }

    public function ajax_list(){
        $list = $this->shipper->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->debitur_name;
            $row[] = '<center style="font-size: small">'.$r->address;
            $row[] = '<center style="font-size: small">'.$r->city;
            $row[] = '<center style="font-size: small">'.$r->pic;
            $row[] = '<center style="font-size: small">'.$r->finance;
            $row[] = '<center style="font-size: small">'.$r->telp;
            $row[] = '<center style="font-size: small">'.$r->hp;
            $row[] = '<center style="font-size: small">'.$r->fax;
            $row[] = '<center style="font-size: small">'.$r->corporate_name;
            $row[] = '<center style="font-size: small">'.$r->bank_name.'/'.$r->account_number;
            
            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_shipper."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_shipper."'".')">X</a>';

            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->shipper->countAll(),
            "recordsFiltered" => $this->shipper->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->shipper->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function addData() {
        $result = $this->shipper->saveData($_POST);

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
        $result = $this->shipper->updateData($_POST);

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


