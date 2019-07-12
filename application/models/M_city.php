  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_city extends MY_Model{
    var $table            = 'm_city';
    var $column_order     = array('idm_city'); //set column field database for datatable orderable
    var $column_search    = array('city_code,city_name'); //set column field database for datatable searchable
    var $order            = array('idm_city' => 'asc'); // default order

    public function get_datatable() {
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

    public function getData($id){
        $this->db->from($this->table);
        $this->db->where('idm_city',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row_array();
    }

    public function getAllData(){
        $this->db->from($this->table);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->result();
    }

    public function saveData($post){
        $city_code = $this->db->escape_str($post['city_code']);
        $city_name = $this->db->escape_str($post['city_name']);

        $data = array(
            'city_code' => $city_code,
            'city_name' => $city_name,
        );

        $result = $this->save_where($this->table,$data);

        if($result['status'])
            return TRUE;
        else
            return FALSE;
    }

    public function updateData($post){
        $city_code = $this->db->escape_str($post['city_code']);
        $city_name = $this->db->escape_str($post['city_name']);

        $where = array(
            'idm_city' => $this->db->escape_str($post['idm_city'])
        );

        $data = array(
            'city_code' => $city_code,
            'city_name' => $city_name,
        );
        $result= $this->update_where($this->table,$where,$data);

        if($result)
            return TRUE;
        else
            return FALSE;
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_city', $id);
        $this->db->update($this->table);
    }
}
?>
