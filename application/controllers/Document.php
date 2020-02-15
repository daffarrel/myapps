<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->ceksesi();
    }
    
    public function ajax_list(){
        $list = $this->document->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->jenis_doc;

            $row[] = '<center>
            <a class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_document."'".')">E</a>
            <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_document."'".')">X</a>';

            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->document->countAll(),
            "recordsFiltered" => $this->document->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_doc_table(){
        $id = $this->input->post('id');
        $locked = $this->input->post('locked');
        $list = $this->document->get_datatable_doc($id);
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->jenis_doc;
            $row[] = '<center style="font-size: small">'.$r->no_doc;
            $row[] = '<center style="font-size: small">'.$r->date_doc;
            
            if($locked != '' && $locked == '1'){
                if($r->file != NULL || $r->file != ''){
                    $row[] = '<center><button class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit_doc('."'".$r->id_ship_doc."'".')">E</button>
                    <button class="btn btn-success" href="javascript:void(0)" title="Doc" onclick="open_doc('."'".$r->file."'".')">F</button>
                    <button class="btn btn-danger" href="javascript:void(0)" title="Del File" onclick="delete_file('."'".$r->id_ship_doc."'".')">XF</button>';
                } else{
                    $row[] = '<center>
                    <button class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit_doc('."'".$r->id_ship_doc."'".')">E</button>';
                }
            }else{
                if($r->file != NULL || $r->file != ''){
                    $row[] = '<center>
                    <button class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit_doc('."'".$r->id_ship_doc."'".')">E</button>
                    <button class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del_doc('."'".$r->id_ship_doc."'".')">X</button>
                    <button class="btn btn-success" href="javascript:void(0)" title="Doc" onclick="open_doc('."'".$r->file."'".')">F</button>
                    <button class="btn btn-danger" href="javascript:void(0)" title="Del File" onclick="delete_file('."'".$r->id_ship_doc."'".')">XF</button>
                    ';
                } else{
                    $row[] = '<center>
                    <button class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit_doc('."'".$r->id_ship_doc."'".')">E</button>
                    <button class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del_doc('."'".$r->id_ship_doc."'".')">X</button>
                    ';
                }
            }

            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->document->countAll_doc($id),
            "recordsFiltered" => $this->document->countFiltered_doc($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_doc_table_history(){
        $id = $this->input->post('id');
        $list = $this->document->get_datatable_doc($id);
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->jenis_doc;
            $row[] = '<center style="font-size: small">'.$r->no_doc;
            $row[] = '<center style="font-size: small">'.$r->date_doc;
            
            $row[] = '<center><button class="btn btn-success" href="javascript:void(0)" title="Doc" onclick="open_doc('."'".$r->file."'".')">F</button>';
            //add html for action

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->document->countAll_doc($id),
            "recordsFiltered" => $this->document->countFiltered_doc($id),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete($id){
        $this->document->deleteData($id,'idm_document','m_document');
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id){
		$data = $this->document->getData($id,'idm_document','m_document');
		echo json_encode($data);
    }

    public function ajax_add() {
		$data = array(
			'jenis_doc' => $this->input->post('jenis_doc'),
		);

		if ($this->document->save($data) > 0){
			echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
		}else{
			echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
		}
    }

	public function ajax_update() {
		$data = array(
            'jenis_doc' => $this->input->post('jenis_doc'),
		);

		if ($this->document->update(array('idm_document' => $this->input->post('id') ), $data)) {
			echo json_encode(array("status" => TRUE, "info" => "Update data sukses"));
		}else{
			echo json_encode(array("status" => FALSE, "info" => "Update data gagal"));
		}
    }

    public function ajax_delete_doc($id){
        $this->document->deleteData($id,'id_ship_doc','ship_doc');
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit_doc($id){
		$data = $this->document->getData($id,'id_ship_doc','ship_doc');
		echo json_encode($data);
    }

    public function ajax_add_doc() {
        $this->_validate();
        $table = 'ship_doc';
        $id_doc = $this->input->post('id_doc');
        $data = array(
            'id_doc'    => $this->input->post('id_doc'),
            'jenis_doc' => $this->input->post('jenis_doc'),
            'no_doc'    => $this->input->post('no_doc'),
            'date_doc'  => $this->input->post('doc_date'),
		);

		if (($id = $this->document->save_where($table,$data)) > 0){
            $url = 'ship_doc/'.$id_doc.'/'.$id['insert_id'];
            $name = explode('/',$this->document->getFileName($id['insert_id']));
            $filename = str_replace('dokumen'.$id_doc.$id['insert_id'],"",$name);

            if($filename != $_FILES['doc_file']['name']){
                $fileData = $this->singleUpload('doc_file',$url,$_FILES['doc_file']['name']);
                if($fileData['upload']=='True') {
                    $name      = $fileData['data']['file_name'];
                    $file_path = 'dokumen/'.$url.'/'.$name;
                }
    
                $where = array('id_ship_doc' => $id['insert_id']);
                $data  = array('file' => $file_path);
                $this->document->update_where($table,$where,$data);
            }else{
                $data['doc_file'] = $this->input->post('doc_file');
            }
            
			echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
		}else{
			echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
		}
    }

	public function ajax_update_doc() {
        $this->_validate();
        $table  = 'ship_doc';
        $id     = $this->input->post('id_ship_doc');
		$data = array(
            'id_doc'    => $this->input->post('id_doc'),
            'jenis_doc' => $this->input->post('jenis_doc'),
            'no_doc'    => $this->input->post('no_doc'),
            'date_doc'  => $this->input->post('doc_date'),
        );
        
        if(isset($_FILES['doc_file']['name']) && $_FILES['doc_file']['name'] != ''){
            $id_doc = $this->input->post('id_doc');
            $url = 'ship_doc/'.$id_doc.'/'.$id;
            $name = explode('/',$this->document->getFileName($id));
            $filename = str_replace('dokumen'.$id_doc.$id,"",$name);

            if($filename != $_FILES['doc_file']['name']){
                $fileData = $this->singleUpload('doc_file',$url,$_FILES['doc_file']['name']);
                if($fileData['upload']=='True') {
                    $name      = $fileData['data']['file_name'];
                    $file_path = 'dokumen/ship_doc/'.$url.'/'.$name;
                }
    
                $where = array('id_ship_doc' => $id);
                $data  = array('file' => $file_path);
                $this->document->update_where($table,$where,$data);
            }else{
                $data['doc_file'] = $this->input->post('doc_file');
            }
        }

		if ($this->document->update_where($table ,array('id_ship_doc' => $id ), $data)) {
			echo json_encode(array("status" => TRUE, "info" => "Update data sukses"));
		}else{
			echo json_encode(array("status" => FALSE, "info" => "Update data gagal"));
		}
    }
    
    function getJenisDoc() {
        $unit = $this->document->getOptionAll(); 
        echo json_encode($unit);
    }

    function deleteFile($id){
        $table  = 'ship_doc';
        $data   = array('file' => '');
        $url    = $this->document->getFileName($id);
        $base   = '/var/www/html/myapps/';
        $path   = $base.$url;
        
        if ($this->document->update_where($table ,array('id_ship_doc' => $id ), $data)) {
            unlink($path); 
			echo json_encode(array("status" => TRUE, "info" => "Update data sukses"));
		}else{
			echo json_encode(array("status" => FALSE, "info" => "Update data gagal"));
		}
    }
    
    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        
        if($this->input->post('no_doc') == NULL || $this->input->post('no_doc') == '')
        {
            $data['inputerror'][] = 'no_doc';
            $data['error_string'][] = 'No Dokumen Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}
?>
