<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_container extends MY_Model {
    var $table             = 'm_container';
    var $view              = 'vw_container';
    var $column_order      = array('idm_container'); //set column field database for datatable orderable
    var $column_search     = array('container_number','size','agent_name'); //set column field database for datatable searchable
    var $order             = array('idm_container' => 'asc'); // default order

    function get_datatables_query() {
        $this->db->from($this->view);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatable(){
        $this->get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function countFiltered() {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAll() {
        $this->db->from($this->view);
        return $this->db->count_all_results();
    }

    public function getData($id){
        $this->db->from($this->view);
        $this->db->where('idm_container',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function getAllData(){
        $this->db->from($this->view);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }
    
    public function saveData($post){
        $container_num  = $this->db->escape_str($post['no_container']);
        $size           = $this->db->escape_str($post['size']);
        $agent_id       = $this->db->escape_str($post['agent']);

        $data = array(
            'container_number'  => $container_num,
            'size'              => $size,
            'id_agent'          => $agent_id,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData($post){
        $container_num  = $this->db->escape_str($post['no_container']);
        $size           = $this->db->escape_str($post['size']);
        $agent_id       = $this->db->escape_str($post['agent']);

        $where = array(
            'idm_container' => $this->db->escape_str($post['idm_container'])
        );

        $data = array(
            'container_number'  => $container_num,
            'size'              => $size,
            'id_agent'          => $agent_id,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_container', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }
}
?>
