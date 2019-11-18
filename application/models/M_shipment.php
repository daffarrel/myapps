<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_shipment extends MY_Model {
    var $table             = 'shipment_doc';
    var $view              = 'vw_shipment_doc';
    var $option            = 'm_option';

    var $column_order      = array('id_doc','seal_number','ship_name','process_date','arrival_date','departure_date','unload_load_date','weight','company','agent','shipper','receiver','product'); //set column field database for datatable orderable
    var $column_search     = array('seal_number','container_number','ba_recv_date','process_date','company','agent','origin_city','shipper','receiver','report_num','safeconduct_num','product'); //set column field database for datatable searchable
    var $order             = array('id_doc' => 'asc'); // default order

    //dokumen kapal
    function get_datatables_query() {
        //add custom filter here
        if($this->input->post('seal_number')) {
            $this->db->like('seal_number', $this->input->post('seal_number'));
        }
        if($this->input->post('container_number')) {
            $this->db->like('container_number', $this->input->post('container_number'));
        }
        if($this->input->post('process_date')) {
            $this->db->like('process_date', $this->input->post('process_date'));
        }
        if($this->input->post('company')) {
            $this->db->like('company', $this->input->post('company'));
        }
        if($this->input->post('agent')) {
            $this->db->like('agent', $this->input->post('agent'));
        }
        if($this->input->post('origin_city')) {
            $this->db->like('origin_city', $this->input->post('LastName'));
        }
        if($this->input->post('shipper')) {
            $this->db->like('shipper', $this->input->post('shipper'));
        }
        if($this->input->post('receiver')) {
            $this->db->like('receiver', $this->input->post('receiver'));
        }
        if($this->input->post('product')) {
            $this->db->like('product', $this->input->post('product'));
        }
        if($this->input->post('nama_kapal')) {
            $this->db->like('ship_name', $this->input->post('nama_kapal'));
        }
        if($this->input->post('tgl_kapal_awal') && $this->input->post('tgl_kapal_akhir')) {
            $this->db->where('departure_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_kapal_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_kapal_akhir'))) . '"');
        }
        if($this->input->post('tgl_tiba_awal') && $this->input->post('tgl_tiba_akhir')) {
            $this->db->where('arrival_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_tiba_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_tiba_akhir'))) . '"');
        }
        if($this->input->post('tgl_bm_awal') && $this->input->post('tgl_bm_akhir')) {
            $this->db->where('unload_load_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_bm_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_bm_akhir'))) . '"');
        }

        $this->db->from($this->view);
        $this->db->where('done','0');
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
        $this->db->where('done','0');
        return $this->db->count_all_results();
    }

    public function getData($id = ''){
        $this->db->from($this->table);

        if($id != '')
            $this->db->where('id_doc',$id);
        
        $query = $this->db->get();

        if($query->num_rows() > 0){
            if($id != '')
                return $query->row();
            else
                return $query->result();
        }    
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('id_doc', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function confirmDoc($id){
        $this->db->set('done','1');
        $this->db->where('id_doc', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    //other function
    public function getCompany(){
        $this->db->where('nama_grup','company');
        $this->db->from($this->option);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }

    public function getSeal(){
        $this->db->select('id_doc,seal_number,size');
        $this->db->where('done','0');

        $this->db->from($this->view);
        $this->db->distinct();
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }    

    public function getSealNumber(){
        $this->db->select('id_ship_arr,id_doc,seal_number');
        $this->db->from($this->view_arr);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();

    }

    public function updateLocked($id){
        $this->db->set('locked','1');
        $this->db->where('id_doc',$id);
        $this->db->update($this->table);
        
        return $this->db->affected_rows();
    }

    //history data dokumen kapal
    function get_datatables_query_history($tgl_awal,$tgl_akhir) {
        //add custom filter here
        if($this->input->post('seal_number')) {
            $this->db->like('seal_number', $this->input->post('seal_number'));
        }
        if($this->input->post('container_number')) {
            $this->db->like('container_number', $this->input->post('container_number'));
        }
        if($this->input->post('process_date')) {
            $this->db->like('process_date', $this->input->post('process_date'));
        }
        if($this->input->post('company')) {
            $this->db->like('company', $this->input->post('company'));
        }
        if($this->input->post('agent')) {
            $this->db->like('agent', $this->input->post('agent'));
        }
        if($this->input->post('origin_city')) {
            $this->db->like('origin_city', $this->input->post('LastName'));
        }
        if($this->input->post('shipper')) {
            $this->db->like('shipper', $this->input->post('shipper'));
        }
        if($this->input->post('receiver')) {
            $this->db->like('receiver', $this->input->post('receiver'));
        }
        if($this->input->post('product')) {
            $this->db->like('product', $this->input->post('product'));
        }
        if($this->input->post('nama_kapal')) {
            $this->db->like('ship_name', $this->input->post('nama_kapal'));
        }
        if($this->input->post('tgl_kapal_awal') && $this->input->post('tgl_kapal_akhir')) {
            $this->db->where('departure_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_kapal_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_kapal_akhir'))) . '"');
        }
        if($this->input->post('tgl_tiba_awal') && $this->input->post('tgl_tiba_akhir')) {
            $this->db->where('arrival_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_tiba_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_tiba_akhir'))) . '"');
        }
        if($this->input->post('tgl_bm_awal') && $this->input->post('tgl_bm_akhir')) {
            $this->db->where('unload_load_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_bm_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_bm_akhir'))) . '"');
        }

        $this->db->from($this->view);
        $this->db->where('process_date BETWEEN "'. $tgl_awal. '" and "'. $tgl_akhir.'"');
        $this->db->where('done','1');
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

    public function get_datatable_history($tgl_awal,$tgl_akhir){
        $this->get_datatables_query_history($tgl_awal,$tgl_akhir);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function countFilteredHistory($tgl_awal,$tgl_akhir) {
        $this->get_datatables_query_history($tgl_awal,$tgl_akhir);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAllHistory($tgl_awal,$tgl_akhir) {
        $this->db->from($this->view);
        $this->db->where('process_date BETWEEN "'. $tgl_awal. '" and "'. $tgl_akhir.'"');
        $this->db->where('done','1');
        return $this->db->count_all_results();
    }
}
?>
