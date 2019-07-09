<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bank extends MY_Model {
    var $table            = 'm_bank';
    var $column_order     = array('idm_bank'); //set column field database for datatable orderable
    var $column_search    = array('bank_name'); //set column field database for datatable searchable
    var $order            = array('idm_bank' => 'asc'); // default order

    public function get_datatable()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where('soft_delete','0');
        $query = $this->db->get();

        return $query->result();
    }

    function countFiltered()
    {
        $this->_get_datatables_query();
        $this->db->where('soft_delete','0');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAll()
    {
        $this->db->from($this->table);
        $this->db->where('soft_delete','0');
        return $this->db->count_all_results();
    }

    public function getData($id){
        $this->db->from($this->table);
        $this->db->where('idm_bank',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row_array();
    }

    public function saveData($post){
        $bank_code = $this->db->escape_str($post['bank_code']);
        $bank_name = $this->db->escape_str($post['bank_name']);

        $data = array(
            'bank_code'  => $bank_code,
            'bank_name' => $bank_name,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return TRUE;
        else
            return FALSE;
    }

    public function updateData($post){
        $bank_code = $this->db->escape_str($post['bank_code']);
        $bank_name = $this->db->escape_str($post['bank_name']);

        $where = array(
            'idm_bank' => $this->db->escape_str($post['idm_bank'])
        );

        $data = array(
            'bank_code' => $bank_code,
            'bank_name' => $bank_name,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_bank', $id);
        $this->db->update($this->table);
    }

    public function getDataAll(){
        $this->db->from($this->table);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }
}
?>
