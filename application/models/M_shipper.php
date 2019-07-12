<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_shipper extends MY_Model {
    var $table             = 'm_shipper';
    var $view              = 'vw_shipper';
    var $column_order      = array('idm_shipper'); //set column field database for datatable orderable
    var $column_search     = array('debitur_name,address,city,pic,finance,telp,hp,fax,corporate_name,bank_name,account_number'); //set column field database for datatable searchable
    var $order             = array('idm_shipper' => 'asc'); // default order

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
        $this->db->where('idm_shipper',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function saveData($post){
        $debitur    = $this->db->escape_str($post['pengirim']);
        $address    = $this->db->escape_str($post['alamat']);
        $city       = $this->db->escape_str($post['kota']);
        $pic        = $this->db->escape_str($post['pic']);
        $finance    = $this->db->escape_str($post['finance']);
        $telp       = $this->db->escape_str($post['telp']);
        $hp         = $this->db->escape_str($post['hp']);
        $fax        = $this->db->escape_str($post['fax']);
        $corporate  = $this->db->escape_str($post['perusahaan']);
        $bank       = $this->db->escape_str($post['bank']);
        $account    = $this->db->escape_str($post['no_rek']);

        $data = array(
            'debitur_name'      => $debitur,
            'address'           => $address,
            'city'              => $city,
            'pic'               => $pic,
            'finance'           => $finance,
            'telp'              => $telp,
            'hp'                => $hp,
            'fax'               => $fax,
            'corporate_name'    => $corporate,
            'id_bank'           => $bank,
            'account_number'    => $account
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData($post){
        $debitur    = $this->db->escape_str($post['pengirim']);
        $address    = $this->db->escape_str($post['alamat']);
        $city       = $this->db->escape_str($post['kota']);
        $pic        = $this->db->escape_str($post['pic']);
        $finance    = $this->db->escape_str($post['finance']);
        $telp       = $this->db->escape_str($post['telp']);
        $hp         = $this->db->escape_str($post['hp']);
        $fax        = $this->db->escape_str($post['fax']);
        $corporate  = $this->db->escape_str($post['perusahaan']);
        $bank       = $this->db->escape_str($post['bank']);
        $account    = $this->db->escape_str($post['no_rek']);

        $where = array(
            'idm_shipper' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'debitur_name'      => $debitur,
            'address'           => $address,
            'city'              => $city,
            'pic'               => $pic,
            'finance'           => $finance,
            'telp'              => $telp,
            'hp'                => $hp,
            'fax'               => $fax,
            'corporate_name'    => $corporate,
            'id_bank'           => $bank,
            'account_number'    => $account
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_shipper', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }
}
?>
