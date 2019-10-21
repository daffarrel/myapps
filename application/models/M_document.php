<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_document extends MY_Model {
    var $table             = 'm_document';
    var $view              = 'vw_document';
    var $table_doc         = 'ship_doc';
    var $view_doc          = 'vw_ship_doc';

    var $column_order      = array('id_doc',null); //set column field database for datatable orderable
    var $column_search     = array('jenis_doc'); //set column field database for datatable searchable
    var $order             = array('idm_document' => 'asc'); // default order

    var $column_order_doc      = array('id_ship_doc',null); //set column field database for datatable orderable
    var $column_search_doc     = array('jenis_doc','no_doc','date_doc'); //set column field database for datatable searchable
    var $order_doc             = array('id_ship_doc' => 'asc'); // default order

    function get_datatables_query() {
        $this->db->from($this->table);
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
        
        $this->db->where('soft_delete','0');
        $query = $this->db->get();
        return $query->result();
    }

    function countFiltered() {
        $this->get_datatables_query();
        $this->db->where('soft_delete','0');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAll() {
        $this->db->from($this->table);
        $this->db->where('soft_delete','0');
        return $this->db->count_all_results();
    }

    function get_datatables_query_doc($id) {
        $this->db->from($this->view_doc);
        $this->db->where('id_doc',$id);
        $i = 0;

        foreach ($this->column_search_doc as $item) // loop column
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

                if(count($this->column_search_doc) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_doc[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_doc))
        {
            $order = $this->order_doc;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatable_doc($id){
        $this->get_datatables_query_doc($id);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        
        $query = $this->db->get();
        return $query->result();
    }

    function countFiltered_doc($id) {
        $this->get_datatables_query_doc($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAll_doc($id) {
        $this->db->from($this->view_doc);
        $this->db->where('id_doc',$id);
        return $this->db->count_all_results();
    }

    public function getData($id){
        $this->db->from($this->table);
        $this->db->where('idm_document',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function getDocData($id){
        $this->db->from($this->table_doc);
        $this->db->where('id_ship_doc',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function getDataAll(){
        $this->db->from($this->table);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }

    function getOptionAll() {
        $this->db->select('idm_document, jenis_doc');
        $this->db->where('soft_delete','0');
        $records=$this->db->get($this->table);
        
        if($records->num_rows() > 0)
            return $records->result();
        //$data=array(); 
        //$data[0] = 'SELECT';
        /* 
        foreach ($records->result() as $row){
            $data[$row->idm_document] = $row->jenis_doc;
        }
        return ($data);
        */
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_document', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function deleteDocData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('id_ship_doc', $id);
        $this->db->update($this->table_doc);

        return $this->db->affected_rows();
    }
}
?>
