<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_agent extends MY_Model {
    var $table             = 'm_agent';
    var $column_order      = array('idm_agent'); //set column field database for datatable orderable
    var $column_search     = array('agent_name','address','telp','hp','fax'); //set column field database for datatable searchable
    var $order             = array('idm_agent' => 'desc'); // default order

    public function get_datatable(){
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

    public function getData($id = ''){
        if($id != '')
            $this->db->where('idm_agent',$id);

        $this->db->where('soft_delete','0');
        $query = $this->db->get($this->table);

        if($query->num_rows() > 0){
            if($id != '')
                return $query->row();
            else
                return $query->result();
        }   
    }

    public function saveData($post){
        $agent_name = $this->db->escape_str($post['agent_name']);
        $address    = $this->db->escape_str($post['address']);
        $telp       = $this->db->escape_str($post['no_telp']);
        $hp         = $this->db->escape_str($post['no_hp']);
        $fax        = $this->db->escape_str($post['no_fax']);

        if("" == trim($post['address'])){
            $address = ' ';
        }
        if("" == trim($post['no_telp'])){
            $telp = ' ';
        }
        if("" == trim($post['no_hp'])){
            $hp = ' ';
        }
        if("" == trim($post['no_fax'])){
            $fax = ' ';
        }

        $data = array(
            'agent_name'    => $agent_name,
            'address'       => $address,
            'telp'          => $telp,
            'hp'            => $hp,
            'fax'           => $fax,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData($post){
        $agent_name = $this->db->escape_str($post['agent_name']);
        $address    = $this->db->escape_str($post['address']);
        $telp       = $this->db->escape_str($post['no_telp']);
        $hp         = $this->db->escape_str($post['no_hp']);
        $fax        = $this->db->escape_str($post['no_fax']);

        if("" == trim($post['address'])){
            $address = ' ';
        }
        if("" == trim($post['no_telp'])){
            $telp = ' ';
        }
        if("" == trim($post['no_hp'])){
            $hp = ' ';
        }
        if("" == trim($post['no_fax'])){
            $fax = ' ';
        }

        $where = array(
            'idm_agent' => $this->db->escape_str($post['idm_agent'])
        );

        $data = array(
            'agent_name'    => $agent_name,
            'address'       => $address,
            'telp'          => $telp,
            'hp'            => $hp,
            'fax'           => $fax,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_agent', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }
}
?>
