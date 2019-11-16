<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_doring extends MY_Model {
    //doring
    var $table             = 'doring';
    var $view              = 'vw_doring';
    
    //doring_doc
    var $table_doc         = 'doring_doc';
    //var $view_doc          = 'vw_doring_doc';

    //doring
    var $column_order      = array('id_doring',null,null,null,null,null,null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
    var $column_search     = array('seal_number','on_chassis','unload_date','route_name','plate_number','driver_name','safeconduct_num'); //set column field database for datatable searchable
    var $order             = array('id_doring' => 'asc'); // default order

    //doring_doc
    var $column_order_doc      = array('id_doring_doc'); //set column field database for datatable orderable
    var $column_search_doc     = array(null); //set column field database for datatable searchable
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
        
        $this->db->where('done','0');
        $query = $this->db->get();
        return $query->result();
    }

    function countFiltered() {
        $this->get_datatables_query();
        $this->db->where('done','0');
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
            $this->db->where('id_doring',$id);
        
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
        $this->db->where('id_doring', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function getIDDoc(){
        $this->db->select('id_doc');
        $this->db->from($this->table);
        $this->db->distinct();
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
        else
            return array();
    }

    public function confirmDoring($id){
        $this->db->set('done','1');
        $this->db->where('id_doring', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    //doring_doc
    function get_datatables_query_doc($id) {
        $this->db->from($this->table_doc);
        $this->db->where('id_doring',$id);
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

        $this->db->where('soft_delete','0');
        $query = $this->db->get();
        return $query->result();
    }

    function countFiltered_doc($id) {
        $this->get_datatables_query_doc($id);
        $this->db->where('soft_delete','0');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countAll_doc($id) {
        $this->db->from($this->table_doc);
        $this->db->where('id_doring',$id);
        $this->db->where('soft_delete','0');
        return $this->db->count_all_results();
    }

    public function deleteDoc($id){
        $this->db->set('soft_delete','1');
        $this->db->where('id_doring_doc', $id);
        $this->db->update($this->table_doc);

        return $this->db->affected_rows();
    }

    public function confirmDoc($id){
        $this->db->set('checklist','yes');
        $this->db->where('id_doring_doc', $id);
        $this->db->update($this->table_doc);

        return $this->db->affected_rows();
    }

    public function cekDoc($id){
        $this->db->from($this->table_doc);
        $this->db->where('id_doring',$id);
        $this->db->where('soft_delete','0');
        $this->db->where('checklist','no');
        return $this->db->count_all_results();
    }

    //fungsi lain - lain
    public function report_gaji($tgl_awal,$tgl_akhir){
        $sql = "SELECT 
        m_driver.driver_name as driver_name,
        sum(if((month(`vw_doring`.`on_chassis`) = '1'),`vw_doring`.`fare`,0)) AS `bulan_1`,
        sum(if((month(`vw_doring`.`on_chassis`) = '2'),`vw_doring`.`fare`,0)) AS `bulan_2`,
        sum(if((month(`vw_doring`.`on_chassis`) = '3'),`vw_doring`.`fare`,0)) AS `bulan_3`,
        sum(if((month(`vw_doring`.`on_chassis`) = '4'),`vw_doring`.`fare`,0)) AS `bulan_4`,
        sum(if((month(`vw_doring`.`on_chassis`) = '5'),`vw_doring`.`fare`,0)) AS `bulan_5`,
        sum(if((month(`vw_doring`.`on_chassis`) = '6'),`vw_doring`.`fare`,0)) AS `bulan_6`,
        sum(if((month(`vw_doring`.`on_chassis`) = '7'),`vw_doring`.`fare`,0)) AS `bulan_7`,
        sum(if((month(`vw_doring`.`on_chassis`) = '8'),`vw_doring`.`fare`,0)) AS `bulan_8`,
        sum(if((month(`vw_doring`.`on_chassis`) = '9'),`vw_doring`.`fare`,0)) AS `bulan_9`,
        sum(if((month(`vw_doring`.`on_chassis`) = '10'),`vw_doring`.`fare`,0)) AS `bulan_10`,
        sum(if((month(`vw_doring`.`on_chassis`) = '11'),`vw_doring`.`fare`,0)) AS `bulan_11`,
        sum(if((month(`vw_doring`.`on_chassis`) = '12'),`vw_doring`.`fare`,0)) AS `bulan_12`
        FROM m_driver 
        LEFT JOIN `vw_doring` on `m_driver`.`idm_driver` = `vw_doring`.`id_driver`
        WHERE on_chassis BETWEEN ? AND ?
        GROUP BY m_driver.driver_name";
        
        $query = $this->db->query($sql, array($tgl_awal,$tgl_akhir));
        return $query;
    }
}
?>
