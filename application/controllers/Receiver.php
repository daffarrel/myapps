<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receiver extends MY_Controller{
    var $id_table   = 'idm_receiver';
    var $table      = 'm_receiver';

    public function ajax_list(){
        $list = $this->receiver->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->receiver_name;
            $row[] = '<center style="font-size: small">'.$r->address;
            $row[] = '<center style="font-size: small">'.$r->city;
            $row[] = '<center style="font-size: small">'.$r->telp;
            $row[] = '<center style="font-size: small">'.$r->hp;
            $row[] = '<center style="font-size: small">'.$r->fax;
            $row[] = '<center style="font-size: small">'.$r->corporate_name;
            $row[] = '<center style="font-size: small">'.$r->bank_name.'/'.$r->account_number;

            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_receiver."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_receiver."'".')">X</a>';

            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->receiver->countAll(),
            "recordsFiltered" => $this->receiver->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
		$data = $this->receiver->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $receiver   = $this->db->escape_str($post['penerima']);
        $address    = $this->db->escape_str($post['alamat']);
        $city       = $this->db->escape_str($post['kota']);
        $telp       = $this->db->escape_str($post['telp']);
        $hp         = $this->db->escape_str($post['hp']);
        $fax        = $this->db->escape_str($post['fax']);
        $corporate  = $this->db->escape_str($post['perusahaan']);
        $bank       = $this->db->escape_str($post['bank']);
        $account    = $this->db->escape_str($post['no_rek']);

        $data = array(
            'receiver_name'     => $receiver,
            'address'           => $address,
            'city'              => $city,
            'telp'              => $telp,
            'hp'                => $hp,
            'fax'               => $fax,
            'corporate_name'    => $corporate,
            'id_bank'           => $bank,
            'account_number'    => $account
        );
        
        if($save == 'add'){
            if ($this->receiver->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->receiver->update_where($this->table ,array($this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function delete($id){
        $this->receiver->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function getData($id = ''){
        $data = $this->receiver->getData($id);
        echo json_encode($data);
    }
}
?>


