<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{
    public function __construct() {
        parent::__construct();
        //$this->ceksesi();
    }

    var $id_table       = 'id';
    var $table          = 'user' ;

    public function ajax_list(){
        $this->ceksesi();
        $list = $this->admin->get_datatable();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $r) {
            $no++;
            $row = array();
            $row[] = '<center style="font-size: small">'.$no;
            $row[] = '<center style="font-size: small">'.$r->user_id;
            $row[] = '<center style="font-size: small">'.$r->name;
            $row[] = '<center style="font-size: small">'.$r->email;
            if($r->image != NULL || $r->image != '')
                $row[] = '<center style="font-size: small">'.'<a class="btn btn-info" href="javascript:void(0)" title="View" onclick="view_image('."'".$r->image."'".')">View</a>';
            else
                $row[] ='';
            $row[] = '<center style="font-size: small">'.$r->role_name;
            $row[] = '<center style="font-size: small">'.date('d F Y H:i:s',$r->date_created);

            $row[] = '<center><a class="btn btn-info" href="javascript:void(0)" title="Edit" onclick="edit('."'".$r->id."'".')">E</a>
                    <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="del('."'".$r->id."'".')">X</a>';
            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->admin->countAll(),
            "recordsFiltered" => $this->admin->countFiltered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
        $this->ceksesi();
		$data = $this->admin->getData($id,$this->id_table,$this->table);
		echo json_encode($data);
    }

    public function ajax_save(){
        $this->ceksesi();
        $this->_validate();
        $save = $this->input->post('save_method');
        $post = $_POST;

        $user   = $this->db->escape_str($post['username']);
        $email  = $this->db->escape_str($post['email']);
        $name   = $this->db->escape_str($post['name']);
        //$image  = $this->db->escape_str($post['image']);
        $role   = $this->db->escape_str($post['role']);

        if($save == 'add'){
            $pass   = $this->db->escape_str($post['pass']);
            $data = array(
                'user_id'       => $user,
                'email'         => $email,
                'name'          => $name,
                'password'      => password_hash($pass, PASSWORD_DEFAULT),
                'role_id'       => $role,
                'date_created'  => time()
            );

            if ($id = $this->admin->save_where($this->table,$data) > 0){
                if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ''){
                    $url = 'profile_pic/'.$id['insert_id'];
                    $fileData = $this->singleUpload('image',$url,$_FILES['image']['name']);
                    
                    if($fileData['upload']=='True') {
                        $name      = $fileData['data']['file_name'];
                        $file_path = 'dokumen/profile_pic/'.$url.'/'.$name;
                    }

                    $where = array('id' => $id['insert_id']);
                    $data  = array('image' => $file_path);
                    $this->document->update_where($this->table,$where,$data);
                }
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }else{
            $data = array(
                'user_id'       => $user,
                'email'         => $email,
                'name'          => $name,
                'role_id'       => $role,
            );
            $id = $this->input->post('idm');
            if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ''){
                $url = 'profile_pic/'.$id;
                $fileData = $this->singleUpload('image',$url,$_FILES['image']['name']);
                
                if($fileData['upload']=='True') {
                    $name      = $fileData['data']['file_name'];
                    $file_path = 'dokumen/'.$url.'/'.$name;
                }else{
                    $this->debug_to_console($fileData['error']);
                }
                
                $where = array('id' => $id);
                $data  = array('image' => $file_path);
                $this->document->update_where($this->table,$where,$data);
            }

            if ($this->admin->update_where($this->table ,array( $this->id_table => $id ), $data)){
                echo json_encode(array("status" => TRUE,"info" => "Simpan data sukses"));
            }else{
                echo json_encode(array("status" => FALSE,"info" => "Simpan data gagal"));
            }
        }
    }

    public function delete($id){
        $this->ceksesi();
        $this->admin->deleteData($id);
        echo json_encode(array("status" => TRUE));
    }

    public function updatePass(){
        $this->ceksesi();
    }

    public function getRole(){
        $this->ceksesi();
        $data = $this->admin->getRole();
        echo json_encode($data);
    }

    public function getData(){
        $this->ceksesi();
        $data = $this->admin->getData();
        echo json_encode($data);
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('username') == NULL)
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'username tidak boleh kosong';
            $data['status'] = FALSE;
        }else{
            $data['inputerror'][] = 'username';
            $data['error_string'][] = '';
        }

        if($this->input->post('name') == NULL)
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'nama tidak boleh kosong';
            $data['status'] = FALSE;
        }else{
            $data['inputerror'][] = 'name';
            $data['error_string'][] = '';
        }

        if($this->input->post('email') == NULL)
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'email tidak boleh kosong';
            $data['status'] = FALSE;
        }else if(!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL))
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'format email tidak benar';
            $data['status'] = FALSE;
        }else{
            $data['inputerror'][] = 'email';
            $data['error_string'][] = '';
        }

        if($this->input->post('pass') != $this->input->post('confirm_pass')){
            $data['inputerror'][] = 'pass';
            $data['error_string'][] = 'pass tidak sama dengan confirm pass';
            $data['status'] = FALSE;
        }else{
            $data['inputerror'][] = 'pass';
            $data['error_string'][] = '';
        }

        if($this->input->post('role') == NULL)
        {
            $data['inputerror'][] = 'role';
            $data['error_string'][] = 'role tidak boleh kosong';
            $data['status'] = FALSE;
        }else{
            $data['inputerror'][] = 'role';
            $data['error_string'][] = '';
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function auth(){
        $this->form_validation->set_rules('email','Email or Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run() == FALSE){
            $data['title']  = 'MyAPPS';
            $data['title2'] = 'My<b>APPS</b>';
            $this->load->view('manage/vw_login',$data,'');
        }else{
            $this->_login();
        }
    }

    public function logout(){
        $data = array(
            'status',
            'email',
            'password',
            'name',
            'role',
            'role_name',
            'image',
            'created_date',
        );
        $this->session->unset_userdata($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>You Have Been Logout!</div>');
        redirect('main/login');
    }

    private function _login(){
        $post  = $_POST; 
        $email = $this->db->escape_str($post['email']);
        $pass  = $this->db->escape_str($post['password']);
        $verify = $this->admin->login($email,$pass);

        if($verify['status'] == TRUE){
            $this->session->set_userdata($verify);
            $this->admin->updateUserLog($verify);
            redirect(site_url());
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>One From Your Input is Wrong.<br>Please Try Again !</div>');
            redirect('main/login');
        }
    }

}
?>


