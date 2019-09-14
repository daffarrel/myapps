<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_truck extends MY_Model{
    var $table            = 'm_truck';
    var $column_order     = array('idm_truck'); //set column field database for datatable orderable
    var $column_search    = array('truck_code','plate_number'); //set column field database for datatable searchable
    var $order            = array('idm_truck' => 'asc'); // default order

    public function get_datatable() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where('soft_delete','0');
        $query = $this->db->get();

        return $query->result();
    }

    function countFiltered() {
        $this->_get_datatables_query();
        $this->db->where('soft_delete','0');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAll() {
        $this->db->from($this->table);
        $this->db->where('soft_delete','0');
        return $this->db->count_all_results();
    }

    public function getData($id){
        $this->db->from($this->table);
        $this->db->where('idm_truck',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row_array();
    }

    public function getAllData(){
        $this->db->from($this->table);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }

    public function saveData($post){
        $truck_code     = $this->db->escape_str($post['kode_truk']);
        $plate_number   = $this->db->escape_str($post['no_polisi']);

        $data = array(
            'truck_code'    => $truck_code,
            'plate_number'  => $plate_number,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return TRUE;
        else
            return FALSE;
    }

    public function updateData($post){
        $truck_code     = $this->db->escape_str($post['kode_truk']);
        $plate_number   = $this->db->escape_str($post['no_polisi']);

        $where = array(
            'idm_truck' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'truck_code'    => $truck_code,
            'plate_number'  => $plate_number,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_truck', $id);
        $this->db->update($this->table);
    }

    public function getTruck(){
        $this->db->from($this->table);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();

    }
}
?>
