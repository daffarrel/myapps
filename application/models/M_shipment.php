<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_shipment extends MY_Model {
    var $table             = 'shipment_doc';
    var $view              = 'vw_shipment_doc';
    var $column_order      = array('id_doc',null,null,null,null,null,null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
    var $column_search     = array('seal_number','process_date','origin_city','company','ba_recv_date','agent','container_number','shipper','receiver','report_num','safeconduct_num','product'); //set column field database for datatable searchable
    var $order             = array('id_doc' => 'asc'); // default order

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
        $this->db->where('id_doc',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function saveData($post){
        $seal_number        = $this->db->escape_str($post['seal_num']);
        $process_date       = $this->db->escape_str($post['tgl_proses']);
        $company            = $this->db->escape_str($post['perusahaan']);
        $ba_recv_date       = $this->db->escape_str($post['tgl_terima_ba']);
        $id_agent           = $this->db->escape_str($post['agent']);
        $origin_city        = $this->db->escape_str($post['kota_asal']);
        $id_container       = $this->db->escape_str($post['container']);
        $id_shipper         = $this->db->escape_str($post['pengirim']);
        $id_receiver        = $this->db->escape_str($post['penerima']);
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
        $seal_number        = $this->db->escape_str($post['seal_num']);
        $process_date       = $this->db->escape_str($post['tgl_proses']);
        $company            = $this->db->escape_str($post['perusahaan']);
        $ba_recv_date       = $this->db->escape_str($post['tgl_terima_ba']);
        $id_agent           = $this->db->escape_str($post['agent']);
        $origin_city        = $this->db->escape_str($post['kota_asal']);
        $id_container       = $this->db->escape_str($post['container']);
        $id_shipper         = $this->db->escape_str($post['pengirim']);
        $id_receiver        = $this->db->escape_str($post['penerima']);
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
}
?>
