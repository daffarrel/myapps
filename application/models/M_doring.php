<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_doring extends MY_Model {
    //doring
    var $table             = 'doring';
    var $view              = 'vw_doring';
    
    //doring_doc
    var $table_doc         = 'doring_doc';
    var $view_doc          = 'vw_doring_doc';

    //doring
    var $column_order      = array('id_doring',null,null,null,null,null,null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
    var $column_search     = array('seal_number','on_chassis','unload_date','route_name','plate_number','driver_name','safeconduct_num'); //set column field database for datatable searchable
    var $order             = array('id_doring' => 'asc'); // default order

    //doring_doc
    var $column_order_doc      = array('id_doring_doc'); //set column field database for datatable orderable
    var $column_search_doc     = array('seal_number'); //set column field database for datatable searchable
    var $order_doc             = array('id_doring_doc' => 'asc'); // default order

    //doring
    function get_datatables_query() {
        //add custom filter here
    
        if($this->input->post('tgl_bongkar_awal') && $this->input->post('tgl_bongkar_akhir')) {
            $this->db->where('unload_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_bongkar_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_bongkar_akhir'))) . '"');
        }

        if($this->input->post('tgl_muat_awal') && $this->input->post('tgl_muat_akhir')) {
            $this->db->where('on_chassis BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_muat_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_muat_akhir'))) . '"');
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

    public function getData($id){
        $this->db->from($this->view);
        $this->db->where('id_doring',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function saveData($post){
        $id_ship_arr       = $this->db->escape_str($post['no_seal']);
        $safeconduct_num   = $this->db->escape_str($post['no_surat_jalan']);
        $id_route          = $this->db->escape_str($post['rute']);
        $dk_lk             = $this->db->escape_str($post['dk_lk']);
        $on_chassis        = $this->db->escape_str($post['on_chassis']);
        $unload_date       = $this->db->escape_str($post['door']);
        $id_truck          = $this->db->escape_str($post['truck']);
        $id_driver         = $this->db->escape_str($post['supir']);

        $data = array(
            'id_ship_arr'      => $id_ship_arr,
            'safeconduct_num'  => $safeconduct_num,
            'id_route'         => $id_route,
            'dk_lk'            => $dk_lk,
            'on_chassis'       => $on_chassis,
            'unload_date'      => $unload_date,
            'id_truck'         => $id_truck,
            'id_driver'        => $id_driver,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData($post){
        $id_ship_arr       = $this->db->escape_str($post['no_seal']);
        $safeconduct_num   = $this->db->escape_str($post['no_surat_jalan']);
        $id_route          = $this->db->escape_str($post['rute']);
        $dk_lk             = $this->db->escape_str($post['dk_lk']);
        $on_chassis        = $this->db->escape_str($post['on_chassis']);
        $unload_date       = $this->db->escape_str($post['door']);
        $id_truck          = $this->db->escape_str($post['truck']);
        $id_driver         = $this->db->escape_str($post['supir']);

        $where = array(
            'id_doring' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'id_ship_arr'      => $id_ship_arr,
            'safeconduct_num'  => $safeconduct_num,
            'id_route'         => $id_route,
            'dk_lk'            => $dk_lk,
            'on_chassis'       => $on_chassis,
            'unload_date'      => $unload_date,
            'id_truck'         => $id_truck,
            'id_driver'        => $id_driver,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('id_doring', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    //doring_doc
    function get_datatables_query_doc() {
        //add custom filter here
    
        if($this->input->post('tgl_bongkar_awal') && $this->input->post('tgl_bongkar_akhir')) {
            $this->db->where('unload_date BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_bongkar_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_bongkar_akhir'))) . '"');
        }

        if($this->input->post('tgl_muat_awal') && $this->input->post('tgl_muat_akhir')) {
            $this->db->where('on_chassis BETWEEN "'. date('Y-m-d', strtotime($this->input->post('tgl_muat_awal'))) . '" AND "' . date('Y-m-d', strtotime($this->input->post('tgl_muat_akhir'))) . '"');
        }

        $this->db->from($this->view_doc);
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

    public function get_datatable_doc(){
        $this->get_datatables_query_doc();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function countFiltered_doc() {
        $this->get_datatables_query_doc();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAll_doc() {
        $this->db->from($this->view_doc);
        return $this->db->count_all_results();
    }

    public function getData_doc($id){
        $this->db->from($this->view);
        $this->db->where('id_doring',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function saveData_doc($post){
        $id_ship_arr       = $this->db->escape_str($post['no_seal']);
        $safeconduct_num   = $this->db->escape_str($post['no_surat_jalan']);
        $id_route          = $this->db->escape_str($post['rute']);
        $dk_lk             = $this->db->escape_str($post['dk_lk']);
        $on_chassis        = $this->db->escape_str($post['on_chassis']);
        $unload_date       = $this->db->escape_str($post['door']);
        $id_truck          = $this->db->escape_str($post['truck']);
        $id_driver         = $this->db->escape_str($post['supir']);

        $data = array(
            'id_ship_arr'      => $id_ship_arr,
            'safeconduct_num'  => $safeconduct_num,
            'id_route'         => $id_route,
            'dk_lk'            => $dk_lk,
            'on_chassis'       => $on_chassis,
            'unload_date'      => $unload_date,
            'id_truck'         => $id_truck,
            'id_driver'        => $id_driver,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData_doc($post){
        $id_ship_arr       = $this->db->escape_str($post['no_seal']);
        $safeconduct_num   = $this->db->escape_str($post['no_surat_jalan']);
        $id_route          = $this->db->escape_str($post['rute']);
        $dk_lk             = $this->db->escape_str($post['dk_lk']);
        $on_chassis        = $this->db->escape_str($post['on_chassis']);
        $unload_date       = $this->db->escape_str($post['door']);
        $id_truck          = $this->db->escape_str($post['truck']);
        $id_driver         = $this->db->escape_str($post['supir']);

        $where = array(
            'id_doring' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'id_ship_arr'      => $id_ship_arr,
            'safeconduct_num'  => $safeconduct_num,
            'id_route'         => $id_route,
            'dk_lk'            => $dk_lk,
            'on_chassis'       => $on_chassis,
            'unload_date'      => $unload_date,
            'id_truck'         => $id_truck,
            'id_driver'        => $id_driver,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData_doc($id){
        $this->db->set('soft_delete','1');
        $this->db->where('id_doring', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }
}
?>
