<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_driver extends MY_Model {
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

    public function getData($id){
        $this->db->from($this->table);
        $this->db->where('idm_driver',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function saveData($post){
        $driver_name    = $this->db->escape_str($post['nama_supir']);
        $license_num    = $this->db->escape_str($post['no_sim']);
        $dob            = $this->db->escape_str($post['tgl_lahir']);
        $dob_city       = $this->db->escape_str($post['tmpt_lahir']);
        $address        = $this->db->escape_str($post['alamat']);

        $data = array(
            'driver_name'       => $driver_name,
            'license_number'    => $license_num,
            'dob'               => $dob,
            'dob_city'          => $dob_city,
            'address'           => $address
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData($post){
        $driver_name    = $this->db->escape_str($post['nama_supir']);
        $license_num    = $this->db->escape_str($post['no_sim']);
        $dob            = $this->db->escape_str($post['tgl_lahir']);
        $dob_city       = $this->db->escape_str($post['tmpt_lahir']);
        $address        = $this->db->escape_str($post['alamat']);

        $where = array(
            'idm_driver' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'driver_name'       => $driver_name,
            'license_number'    => $license_num,
            'dob'               => $dob,
            'dob_city'          => $dob_city,
            'address'           => $address
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_driver', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function getDriver(){
        $this->db->from($this->table);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }
}
?>
