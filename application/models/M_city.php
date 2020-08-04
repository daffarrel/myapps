  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_city extends MY_Model{
    var $table            = 'm_city';
    var $column_order     = array('idm_city'); //set column field database for datatable orderable
    var $column_search    = array('city_code','city_name'); //set column field database for datatable searchable
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

    public function getData($id = ''){
        if($id != '')
            $this->db->where('idm_city',$id);
        
        $this->db->where('soft_delete','0');
        $query = $this->db->get($this->table);

        if($query->num_rows() > 0){
            if($id != '')
                return $query->row();
            else
                return $query->result();
        }
    }

    public function deleteData($id){
        $this->db->set('soft_delete','1');
        $this->db->where('idm_city', $id);
        $this->db->update($this->table);
    }
}
?>
