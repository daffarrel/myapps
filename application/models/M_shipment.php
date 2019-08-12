<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_shipment extends MY_Model {
    var $table             = 'shipment_doc';
    var $table_arr         = 'shipment_arrival';
    var $view              = 'vw_shipment_doc';
    var $option            = 'm_option';
    var $view_arr          = 'vw_shipment_arrival';

    var $column_order      = array('id_doc',null,null,null,null,null,null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
    var $column_search     = array('seal_number','container_number','ba_recv_date','process_date','company','agent','origin_city','shipper','receiver','report_num','safeconduct_num','product'); //set column field database for datatable searchable
    var $order             = array('id_doc' => 'asc'); // default order

    var $column_order_arr      = array('id_ship_arr','seal_number','bl_number','bl_date','ship_name','td_weight','arrival_date','unload_load_date'); //set column field database for datatable orderable
    var $column_search_arr     = array('seal_number','bl_number','bl_date','ship_name','td_weight','arrival_date','unload_load_date'); //set column field database for datatable searchable
    var $order_arr             = array('id_ship_arr' => 'asc'); // default order

    function get_datatables_query() {
        //add custom filter here
        if($this->input->post('seal_number')) {
            $this->db->like('seal_number', $this->input->post('seal_number'));
        }
        if($this->input->post('container_number')) {
            $this->db->like('container_number', $this->input->post('container_number'));
        }
        if($this->input->post('ba_recv_date')) {
            $this->db->like('ba_recv_date', $this->input->post('ba_recv_date'));
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
        if($this->input->post('report_num')) {
            $this->db->like('report_num', $this->input->post('report_num'));
        }
        if($this->input->post('safeconduct_num')) {
            $this->db->like('safeconduct_num', $this->input->post('safeconduct_num'));
        }
        if($this->input->post('product')) {
            $this->db->like('product', $this->input->post('product'));
        }
        if($this->input->post('tgl_ba_awal') && $this->input->post('tgl_ba_akhir')) {
            $this->db->where('ba_recv_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_ba_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_ba_akhir'))) . '"');
        }
        if($this->input->post('tgl_doc_awal') && $this->input->post('tgl_doc_akhir')) {
            $this->db->where('process_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_doc_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_doc_akhir'))) . '"');
        }

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

    function get_datatables_query_arr() {
        //add custom filter here
        if($this->input->post('kapal')) {
            $this->db->like('ship_name', $this->input->post('kapal'));
        }
        if($this->input->post('tgl_tiba_awal') && $this->input->post('tgl_tiba_akhir')) {
            $this->db->where('arrival_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_tiba_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_tiba_akhir'))) . '"');
        }
        if($this->input->post('tgl_bm_awal') && $this->input->post('tgl_bm_akhir')) {
            $this->db->where('unload_load_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_bm_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_bm_akhir'))) . '"');
        }
        if($this->input->post('tgl_bl_awal') && $this->input->post('tgl_bl_akhir')) {
            $this->db->where('bl_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_bl_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_bl_akhir'))) . '"');
        }

        $this->db->from($this->view_arr);
        $i = 0;

        foreach ($this->column_search_arr as $item) // loop column
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

                if(count($this->column_search_arr) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_arr[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order_arr))
        {
            $order = $this->order_arr;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatable_arr(){
        $this->get_datatables_query_arr();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function countFilteredArr() {
        $this->get_datatables_query_arr();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAllArr() {
        $this->db->from($this->view_arr);
        return $this->db->count_all_results();
    }

    public function getDataArr($id){
        $this->db->from($this->view_arr);
        $this->db->where('id_doc',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function getData($id){
        $this->db->from($this->view);
        $this->db->where('id_doc',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function getCompany(){
        $this->db->where('nama_grup','company');
        $this->db->from($this->option);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }

    public function getSeal(){
        $this->db->select('id_doc,seal_number');
        $this->db->where('done','0');
        $this->db->from($this->view);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }

    public function saveData($post){
        $seal_number        = $this->db->escape_str($post['no_seal']);
        $process_date       = $this->db->escape_str($post['tgl_proses_dok']);
        $company            = $this->db->escape_str($post['cmpy']);
        $ba_recv_date       = $this->db->escape_str($post['tgl_ba']);
        $id_agent           = $this->db->escape_str($post['agent']);
        $origin_city        = $this->db->escape_str($post['kota_asal']);
        $id_container       = $this->db->escape_str($post['no_kontainer']);
        $id_shipper         = $this->db->escape_str($post['shipper']);
        $id_receiver        = $this->db->escape_str($post['receiver']);
        $report_num         = $this->db->escape_str($post['no_ba']);
        $safeconduct_num    = $this->db->escape_str($post['no_surat_jalan']);
        $po                 = $this->db->escape_str($post['po']);
        $do                 = $this->db->escape_str($post['do']);
        $io                 = $this->db->escape_str($post['io']);
        $condition          = $this->db->escape_str($post['kondisi']);
        $product            = $this->db->escape_str($post['produk']);
        $stuffing           = $this->db->escape_str($post['stuffing']);

        $data = array(
            'seal_number'           => $seal_number,
            'process_date'          => $process_date,
            'company'               => $company,
            'ba_recv_date'          => $ba_recv_date,
            'id_agent'              => $id_agent,
            'origin_city'           => $origin_city,
            'id_container'          => $id_container,
            'id_shipper'            => $id_shipper,
            'id_receiver'           => $id_receiver,
            'report_num'            => $report_num,
            'safeconduct_num'       => $safeconduct_num,
            'po'                    => $po,
            'do'                    => $do,
            'io'                    => $io,
            'condition'             => $condition,
            'product'               => $product,
            'stuffing'              => $stuffing,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData($post){
        $seal_number        = $this->db->escape_str($post['no_seal']);
        $process_date       = $this->db->escape_str($post['tgl_proses_dok']);
        $company            = $this->db->escape_str($post['cmpy']);
        $ba_recv_date       = $this->db->escape_str($post['tgl_ba']);
        $id_agent           = $this->db->escape_str($post['agent']);
        $origin_city        = $this->db->escape_str($post['kota_asal']);
        $id_container       = $this->db->escape_str($post['no_kontainer']);
        $id_shipper         = $this->db->escape_str($post['shipper']);
        $id_receiver        = $this->db->escape_str($post['receiver']);
        $report_num         = $this->db->escape_str($post['no_ba']);
        $safeconduct_num    = $this->db->escape_str($post['no_surat_jalan']);
        $po                 = $this->db->escape_str($post['po']);
        $do                 = $this->db->escape_str($post['do']);
        $io                 = $this->db->escape_str($post['io']);
        $condition          = $this->db->escape_str($post['kondisi']);
        $product            = $this->db->escape_str($post['produk']);
        $stuffing           = $this->db->escape_str($post['stuffing']);

        $where = array(
            'id_doc' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'seal_number'           => $seal_number,
            'process_date'          => $process_date,
            'company'               => $company,
            'ba_recv_date'          => $ba_recv_date,
            'id_agent'              => $id_agent,
            'origin_city'           => $origin_city,
            'id_container'          => $id_container,
            'id_shipper'            => $id_shipper,
            'id_receiver'           => $id_receiver,
            'report_num'            => $report_num,
            'safeconduct_num'       => $safeconduct_num,
            'po'                    => $po,
            'do'                    => $do,
            'io'                    => $io,
            'condition'             => $condition,
            'product'               => $product,
            'stuffing'              => $stuffing,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('id_doc', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function saveDataArr($post){
        $id_doc             = $this->db->escape_str($post['no_seal']);
        $bl_number          = $this->db->escape_str($post['no_bl']);
        $bl_date            = $this->db->escape_str($post['tgl_bl']);
        $ship_name          = $this->db->escape_str($post['nama_kapal']);
        $td                 = $this->db->escape_str($post['td']);
        $weight             = $this->db->escape_str($post['berat']);
        $arrival_date       = $this->db->escape_str($post['tgl_tiba']);
        $unload_load_date   = $this->db->escape_str($post['tgl_tiba']);

        $data = array(
            'id_doc'                => $id_doc,
            'bl_number'             => $bl_number,
            'bl_date'               => $bl_date,
            'ship_name'             => $ship_name,
            'td'                    => $td,
            'weight'                => $weight,
            'weight_remains'        => $weight,
            'arrival_date'          => $arrival_date,
            'unload_load_date'      => $unload_load_date,
        );

        $result = $this->save_where($this->table_arr,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateDataArr($post){
        $id_doc             = $this->db->escape_str($post['no_seal']);
        $bl_number          = $this->db->escape_str($post['no_bl']);
        $bl_date            = $this->db->escape_str($post['tgl_bl']);
        $ship_name          = $this->db->escape_str($post['nama_kapal']);
        $td                 = $this->db->escape_str($post['td']);
        $weight             = $this->db->escape_str($post['berat']);
        $arrival_date       = $this->db->escape_str($post['tgl_tiba']);
        $unload_load_date   = $this->db->escape_str($post['tgl_tiba']);

        $where = array(
            'id_ship_arr' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'id_doc'                => $id_doc,
            'bl_number'             => $bl_number,
            'bl_date'               => $bl_date,
            'ship_name'             => $ship_name,
            'td'                    => $td,
            'weight'                => $weight,
            'weight_remains'        => $weight,
            'arrival_date'          => $arrival_date,
            'unload_load_date'      => $unload_load_date,
        );

        $result= $this->update_where($this->table_arr,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteDataArr($id){
        $this->db->set('soft_delete','1');
        $this->db->where('id_ship_arr', $id);
        $this->db->update($this->table_arr);

        return $this->db->affected_rows();
    }
}
?>
