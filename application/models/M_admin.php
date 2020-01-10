<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends MY_Model {
    var $table             = 'user';
    var $view              = 'vw_user';

    var $column_order      = array('id','user_id','name','email'); //set column field database for datatable orderable
    var $column_search     = array('id','user_id','name','email'); //set column field database for datatable searchable
    var $order             = array('id' => 'asc'); // default order

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

    public function getData($id = ''){
        $this->db->from($this->table);

        if($id != '')
            $this->db->where('id',$id);
        
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
        $this->db->where('id', $id);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }

    public function getRole(){
        $this->db->from('user_role');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    public function login($username,$pass){
        $this->db->where('email',$username);
        $this->db->or_where('user_id',$username);
        $query = $this->db->get($this->view);

        if($query->num_rows() === 1){
            $result   = $query->row(); 
            $password = $result->password;
            if (password_verify($pass,$password)) {
                $data = array(
                    'status'       => TRUE,
                    'name'         => $result->name,
                    'email'        => $result->email,
                    'user'         => $result->user_id,
                    'password'     => $result->password,
                    'role'         => $result->role_id,
                    'image'        => $result->image,
                    'created_date' => $result->date_created,
                );
            } else {
                $data['status'] = FALSE;
            }
        }else{
            $data['status'] = FALSE;
        }

        return $data;
    }

    public function cekSesi($username,$pass){
        $this->db->where('email',$username);
        $this->db->or_where('user_id',$username);
        $query = $this->db->get($this->view);

        if($query->num_rows() === 1){
            $result   = $query->row(); 
            $password = $result->password;
            if ($password == $pass) {
                $data = array(
                    'status'       => TRUE,
                    'name'         => $result->name,
                    'email'        => $result->email,
                    'user'         => $result->user_id,
                    'password'     => $result->password,
                    'role'         => $result->role_id,
                    'image'        => $result->image,
                    'created_date' => $result->date_created,
                );
            } else {
                $data['status'] = FALSE;
            }
        }else{
            $data['status'] = FALSE;
        }

        return $data;
    }

    public function cekUserAccess($role,$menu){
        $this->db->where('role_id',$role);
        $this->db->where('menu_id',$menu);
        $query = $this->db->get('user_access_menu');

        if($query->num_rows() === 1){
            $data['status'] = TRUE;
        }else{
            $data['status'] = FALSE;
        }

        return $data;
    }

}
?>
