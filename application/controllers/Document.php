<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_Controller{
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

            $row[] = '<center>
            <button class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit_doc('."'".$r->id_ship_doc."'".')">E</button>
            <button class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del_doc('."'".$r->id_ship_doc."'".')">X</button>';

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
        $this->document->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id){
		$data = $this->document->getData($id);
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
        $this->document->deleteDocData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit_doc($id){
		$data = $this->document->getDocData($id);
		echo json_encode($data);
    }

    public function ajax_add_doc() {
		$data = array(
            'id_doc'    => $this->input->post('id_doc'),
            'jenis_doc' => $this->input->post('jenis_doc'),
            'no_doc'    => $this->input->post('no_doc'),
            'date_doc'  => $this->input->post('doc_date'),
            'file'      => $this->input->post('file'),
		);

		if ($this->document->save_where('ship_doc',$data) > 0){
			echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
		}else{
			echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
		}
    }

	public function ajax_update_doc() {
		$data = array(
            'id_doc'    => $this->input->post('id_doc'),
            'jenis_doc' => $this->input->post('jenis_doc'),
            'no_doc'    => $this->input->post('no_doc'),
            'date_doc'  => $this->input->post('doc_date'),
            'file'      => $this->input->post('file'),
		);

		if ($this->document->update_where('ship_doc',array('id_ship_doc' => $this->input->post('id_ship_doc') ), $data)) {
			echo json_encode(array("status" => TRUE, "info" => "Update data sukses"));
		}else{
			echo json_encode(array("status" => FALSE, "info" => "Update data gagal"));
		}
    }
    
    function getJenisDoc() {
        $unit = $this->document->getOptionAll(); 
        echo json_encode($unit);
    }
    
}
?>
