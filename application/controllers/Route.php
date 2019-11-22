<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends MY_Controller{
    var $id_table   = 'idm_route';
    var $table      = 'm_route';

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
            $row[] = '<center style="font-size: small">'.$r->size;
            $row[] = '<center style="font-size: small">'."Rp. ".$this->rupiah($r->fare);

            $row[] = '<center><a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->idm_route."'".')">E</a>
                              <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->idm_route."'".')">X</a>';

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

    public function ajax_edit($id){
		$data = $this->route->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $save       = $this->input->post('save_method');
        $post       = $_POST;

        $route_name     = $this->db->escape_str($post['nama_rute']);
        $origin         = $this->db->escape_str($post['asal']);
        $destination    = $this->db->escape_str($post['tujuan']);
        $type           = $this->db->escape_str($post['tipe']);
        $size           = $this->db->escape_str($post['size']);
        $fare           = $this->db->escape_str($post['biaya']);
        $fare_new       = str_replace(".", "", $fare);

        $data = array(
            'route_name'     => $route_name,
            'origin'         => $origin,
            'destination'    => $destination,
            'type'           => $type,
            'size'           => $size,
            'fare'           => $fare_new,
        );

        if($save == 'add'){
            if ($this->route->save_where($this->table,$data) > 0){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $id = $this->input->post('idm');
            if ($this->route->update_where($this->table ,array($this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function delete($id){
        $this->route->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function getData($id = ''){
        $data = $this->route->getData($id);
        echo json_encode($data);
    }

    public function getOptionData($id){
        $data = $this->route->getOptionData($id);
        echo json_encode($data);
    }
}
?>


