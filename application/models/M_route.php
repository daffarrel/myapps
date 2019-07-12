<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_route extends MY_Model {
    var $table             = 'm_route';
    var $option            = 'm_option';

    var $column_order      = array('idm_route'); //set column field database for datatable orderable
    var $column_search     = array('route_name,origin,destination,type,size,fare'); //set column field database for datatable searchable
    var $order             = array('idm_route' => 'asc'); // default order

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

    public function getData($id){
        $this->db->from($this->table);
        $this->db->where('idm_route',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
    }

    public function saveData($post){
        $route_name     = $this->db->escape_str($post['nama_rute']);
        $origin         = $this->db->escape_str($post['asal']);
        $destination    = $this->db->escape_str($post['tujuan']);
        $type           = $this->db->escape_str($post['tipe']);
        $size           = $this->db->escape_str($post['size']);
        $fare           = $this->db->escape_str($post['biaya']);
        
        $data = array(
            'route_name'     => $route_name,
            'origin'         => $origin,
            'destination'    => $destination,
            'type'           => $type,
            'size'           => $size,
            'fare'           => $fare,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return $result;
        else
            return FALSE;
    }

    public function updateData($post){
        $route_name     = $this->db->escape_str($post['nama_rute']);
        $origin         = $this->db->escape_str($post['asal']);
        $destination    = $this->db->escape_str($post['tujuan']);
        $type           = $this->db->escape_str($post['tipe']);
        $size           = $this->db->escape_str($post['size']);
        $fare           = $this->db->escape_str($post['biaya']);

        $where = array(
            'idm_route' => $this->db->escape_str($post['idm'])
        );

        $data = array(
            'route_name'     => $route_name,
            'origin'         => $origin,
            'destination'    => $destination,
            'type'           => $type,
            'size'           => $size,
            'fare'           => $fare,
        );

        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_route', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function getOptionData($grup){
        $this->db->select('subID,value');
        $this->db->where('nama_grup',$grup);
        $query = $this->db->get($this->option);

        if($query->num_rows() > 0){
            return $query->result();
        }
    }
}
?>
