<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doring extends MY_Controller{
    var $id_table       = 'id_doring';
    var $table          = 'doring' ;
    var $id_table_doc   = 'id_doring_doc';
    var $table_doc      = 'doring_doc';

    public function ajax_list(){
        $list = $this->doring->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small"><a class="btn" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id_doring."'".')">'.$r->seal_number.'</a>';
            $row[] = '<center style="font-size: small">'.$r->safeconduct_num;
            $row[] = '<center style="font-size: small">'.$r->route_name;
            $row[] = '<center style="font-size: small">'.$r->dk_lk;
            $row[] = '<center style="font-size: small">'.$r->on_chassis;
            $row[] = '<center style="font-size: small">'.$r->unload_date;
            $row[] = '<center style="font-size: small">'.$r->plate_number;
            $row[] = '<center style="font-size: small">'.$r->driver_name;

            $cek_doc = $this->doring->cekDoc($r->id_doring);

            if($cek_doc > 0 ){
                $row[] = '<center>'.'Belum Kembali Semua';
                $row[] = '<center><a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doring."'".')">D</a>
                        <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id_doring."'".')">X</a>';
            }else{
                $row[] = '<center>'.'Done';
                $row[] = '<center><a class="btn btn-success" href="javascript:void(0)" title="Done" onclick="done('."'".$r->id_doring."'".')">E</a>
                <a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doring."'".')">D</a>';
            }
            
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
        $this->doring->updateLocked();
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id){
		$data       = $this->doring->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save = $this->input->post('save_method');
        $post = $_POST;

        if($save == 'add'){
            $this->_validate();
            $id_doc = $this->db->escape_str($post['no_seal']);
        }else{
            $id_doc = $this->db->escape_str($post['no_seal_temp']);
        }
        
        $safeconduct_num   = $this->db->escape_str($post['no_surat_jalan']);
        $id_route          = $this->db->escape_str($post['rute']);
        $dk_lk             = $this->db->escape_str($post['dk_lk']);
        $on_chassis        = $this->db->escape_str($post['on_chassis']);
        $unload_date       = $this->db->escape_str($post['door']);
        $id_truck          = $this->db->escape_str($post['truck']);
        $id_driver         = $this->db->escape_str($post['supir']);
        $fare              = $this->route->getData($id_route)->fare;

        $data = array(
            'id_doc'           => $id_doc,
            'safeconduct_num'  => $safeconduct_num,
            'id_route'         => $id_route,
            'fare'             => $fare,
            'dk_lk'            => $dk_lk,
            'on_chassis'       => $on_chassis,
            'unload_date'      => $unload_date,
            'id_truck'         => $id_truck,
            'id_driver'        => $id_driver,
        );
        
        if($save == 'add'){
            $doc = $this->document->getShipDoc($id_doc);

            if(empty($doc)){
                echo json_encode(array("status" => FALSE,"info" => "Dokumen Kapal Yang Ingin Di Doring Masih Kosong"));
            } else{
                //update status lock
                $this->shipment->updateLocked($id_doc);
                
                $temp_doc = array();

                if (($result = $this->doring->save_where($this->table,$data)) > 0){
                    //input jumlah dokumen doring yang harus dikembalikan oleh driver
                    foreach($doc as $data_temp){
                        $temp_doc[] = array(
                            'id_doring'     => $result['insert_id'],
                            'date'          => $data_temp->date_doc,
                            'jenis_dokumen' => $data_temp->jenis_doc,
                            'no_dokumen'    => $data_temp->no_doc
                        );
                    }
                    $this->doring->save_where_batch($this->table_doc,$temp_doc);

                    echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses","test" => $doc));
                }else{
                    echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
                }
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->doring->update_where($this->table ,array( $this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function confirm_doring($id){
        $this->doring->confirmDoring($id);
        echo json_encode(array("status" => TRUE));
    }

    public function confirm_doring_doc(){
        $this->_validate_doc();
        $id_doring_doc = $this->input->post('id_doring_doc');
        $id_doring     = $this->input->post('id_doring');

        if(isset($_FILES['file_doring']['name']) && $_FILES['file_doring']['name'] != ''){
            $url = 'doring/'.$id_doring.'/'.$id_doring_doc;
            //$file_name = explode(".",$_FILES['doc_file']['name']);
            $fileData = $this->singleUpload('file_doring',$url,$_FILES['file_doring']['name']);
            
            if($fileData['upload']=='True') {
                $name      = $fileData['data']['file_name'];
                $file_path = 'dokumen/doring/'.$url.'/'.$name;
            }

            $data  = array(
                'checklist' => 'yes',
                'file'      => $file_path
            );
            $file = $this->doring->confirmDoc($id_doring_doc,$data);

            if($file > 0)
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            else
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
        }
    }

    private function _validate_doc() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if(!isset($_FILES['file_doring']['name']) && $_FILES['file_doring']['name'] == '')
        {
            $data['inputerror'][] = 'file_doring';
            $data['error_string'][] = 'File Dokumen Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    //doring_doc
    public function ajax_list_doc(){
        $id = $this->input->post('id');
        $list = $this->doring->get_datatable_doc($id);
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->no_dokumen;
            $row[] = '<center style="font-size: small">'.$r->jenis_dokumen;
            $row[] = '<center style="font-size: small">'.$r->date;
            if($r->checklist == 'no')
                $row[] = '<center><button class="btn btn-info" href="javascript:void(0)" title="Confirm" onclick="upload('."'".$r->id_doring_doc."'".')">K</button>';
            else
                $row[] = '<center><button class="btn btn-success" href="javascript:void(0)" title="File Dokumen" onclick="file_doc('."'".$r->file."'".')">F</button>';
            
            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doring->countAll_doc($id),
            "recordsFiltered" => $this->doring->countFiltered_doc($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete_doc($id){
        $this->doring->deleteData_doc($id);
        echo json_encode(array("status" => TRUE));
    }

    public function confirm_doc($id){
        $this->doring->confirmDoc($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit_doc($id){
		$data = $this->doring->getData($id,$this->id_table_doc,$this->table_doc);
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
        }else{
            $id = $this->input->post('no_seal');
            $check_dok = $this->document->cekDok($id);
            
            if($check_dok == FALSE){
                $data['inputerror'][] = 'no_seal';
                $data['error_string'][] = 'Dokumen Kapal Masih Kosong';
                $data['status'] = FALSE;
            }
        }

        if($this->input->post('no_surat_jalan') == NULL)
        {
            $data['inputerror'][] = 'no_surat_jalan';
            $data['error_string'][] = 'No Surat Jalan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_edit_doc_table($id){
		$data = $this->doring->getData($id,'doring_doc');
		echo json_encode($data);
    }

    //fungsi lain
    public function report_gaji(){
        $tgl_awal  = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $report = $this->doring->report_gaji($tgl_awal,$tgl_akhir)->result();
        $recordTotal = $this->doring->report_gaji($tgl_awal,$tgl_akhir)->num_rows();
        $recordFiltered = $this->doring->report_gaji($tgl_awal,$tgl_akhir)->num_rows();
        
        $data = array();
        $no = $_POST['start'];
        $temp_bln_1 = 0;
        $temp_bln_2 = 0;
        $temp_bln_3 = 0;
        $temp_bln_4 = 0;
        $temp_bln_5 = 0;
        $temp_bln_6 = 0;
        $temp_bln_7 = 0;
        $temp_bln_8 = 0;
        $temp_bln_9 = 0;
        $temp_bln_10 = 0;
        $temp_bln_11 = 0;
        $temp_bln_12 = 0;
        $temp_bln_total = 0;

        foreach ($report as $r) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $r->driver_name;
            $row[] = $r->bulan_1;
            $row[] = $r->bulan_2;
            $row[] = $r->bulan_3;
            $row[] = $r->bulan_4;
            $row[] = $r->bulan_5;
            $row[] = $r->bulan_6;
            $row[] = $r->bulan_7;
            $row[] = $r->bulan_8;
            $row[] = $r->bulan_9;
            $row[] = $r->bulan_10;
            $row[] = $r->bulan_11;
            $row[] = $r->bulan_12;

            $total_bulan = $r->bulan_1 + ($r->bulan_2) + ($r->bulan_3) + ($r->bulan_4) + ($r->bulan_5) + ($r->bulan_6) + ($r->bulan_7) + ($r->bulan_8) + ($r->bulan_9) + ($r->bulan_10) + ($r->bulan_11) + ($r->bulan_12);
            
            $row[] = $total_bulan;
            
            $temp_bln_1      += $r->bulan_1;
            $temp_bln_2      += $r->bulan_2;
            $temp_bln_3      += $r->bulan_3;
            $temp_bln_4      += $r->bulan_4;
            $temp_bln_5      += $r->bulan_5;
            $temp_bln_6      += $r->bulan_6;
            $temp_bln_7      += $r->bulan_7;
            $temp_bln_8      += $r->bulan_8;
            $temp_bln_9      += $r->bulan_9;
            $temp_bln_10     += $r->bulan_10;
            $temp_bln_11     += $r->bulan_11;
            $temp_bln_12     += $r->bulan_12;
            $temp_bln_total  += $total_bulan;
            //add html for action
            $data[] = $row;
        }
        $data[] = array(
            '',
            'Total Per Bulan',
            $temp_bln_1,
            $temp_bln_2,
            $temp_bln_3,
            $temp_bln_4,
            $temp_bln_5,
            $temp_bln_6,
            $temp_bln_7,
            $temp_bln_8,
            $temp_bln_9,
            $temp_bln_10,
            $temp_bln_11,
            $temp_bln_12,
            $temp_bln_total,
        );

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $recordTotal,
            "recordsFiltered" => $recordFiltered,
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    //history data doring
    public function ajax_list_history(){
        $tgl_awal  = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $list = $this->doring->get_datatable_history($tgl_awal,$tgl_akhir);
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->seal_number;
            $row[] = '<center style="font-size: small">'.$r->safeconduct_num;
            $row[] = '<center style="font-size: small">'.$r->route_name;
            $row[] = '<center style="font-size: small">'.$r->dk_lk;
            $row[] = '<center style="font-size: small">'.$r->on_chassis;
            $row[] = '<center style="font-size: small">'.$r->unload_date;
            $row[] = '<center style="font-size: small">'.$r->plate_number;
            $row[] = '<center style="font-size: small">'.$r->driver_name;
            $row[] = '<center><a class="btn btn-info" href="javascript:void(0)" title="Doc" onclick="doc('."'".$r->id_doring."'".')">D</a>';
            
            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doring->countAllHistory($tgl_awal,$tgl_akhir),
            "recordsFiltered" => $this->doring->countFilteredHistory($tgl_awal,$tgl_akhir),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_doc_history(){
        $id = $this->input->post('id');
        $list = $this->doring->get_datatable_doc($id);
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->no_dokumen;
            $row[] = '<center style="font-size: small">'.$r->jenis_dokumen;
            $row[] = '<center style="font-size: small">'.$r->date;
            
            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doring->countAll_doc($id),
            "recordsFiltered" => $this->doring->countFiltered_doc($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
?>


