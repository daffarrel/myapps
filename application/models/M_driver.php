<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_driver extends MY_Model {
    var $id_table          = 'idm_driver';
    var $table             = 'm_driver';
    var $column_order      = array('idm_driver'); //set column field database for datatable orderable
    var $column_search     = array('driver_name','license_number','dob','dob_city','address'); //set column field database for datatable searchable
    var $order             = array('idm_driver' => 'asc'); // default order

    public function get_datatable(){
        $this->_get_datatables_query();
        $this->db->where('soft_delete','0');
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
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

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where($this->id_table, $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function getData($id = ''){
        if($id != '')
            $this->db->where($this->id_table,$id);
        
        $this->db->where('soft_delete','0');
        $query = $this->db->get($this->table);

        if($query->num_rows() > 0){
            if($id != '')
                return $query->row();
            else
                return $query->result();
        }
    }

}
?>
