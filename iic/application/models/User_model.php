<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'user_id';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        // $this->datatables->select('user_id,usr_username,usr_password,id_user_level,usr_status');
        // $this->datatables->from('user');

        // try from application
  //       $this->datatables->select('user.*,staff.*,application.*,app_id');
  //       $this->datatables->from('application');
  //       $this->datatables->join('user', 'application.user_id = user.user_id');
  //       $this->datatables->join('staff', 'application.user_id = staff.user_id');
  //       $this->datatables->where('user.id_user_level', 'member');
  //       //$this->datatables->where('user.usr_status', 'active');
		// $this->datatables->where('user.usr_status !=', 'pending');

  //       $this->datatables->add_column('action', anchor(site_url('user/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i> View', array('class' => 'btn btn-info btn-sm'))." | ".anchor(site_url('user/update/$1'),'<i class="icofont icofont-edit" aria-hidden="true"></i> Change Status', array('class' => 'btn btn-success btn-sm'))." | ".anchor(site_url('user/delete/$1'),'<i class="icofont icofont-ui-delete" aria-hidden="true"></i> Delete', array('class' => 'btn btn-danger btn-sm delete-btn')), 'app_id');
  //       return $this->datatables->generate();

    }

    
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

     // get data by id for session
    function get_user($id)
    {
        $this->db->where($this->user, $id);
        $result = $this->db->get($this->table,1);
        return $result;
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('user_id', $q);
    	$this->db->or_like('user_username', $q);
    	$this->db->or_like('user_email', $q);
    	$this->db->or_like('email_verified_at', $q);
    	$this->db->or_like('user_password', $q);
        $this->db->or_like('user_remember_token', $q);
        $this->db->or_like('role_id', $q);
        $this->db->or_like('user_avatar', $q);
        $this->db->or_like('user_status', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('updated_at', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('user_id', $q);
    	$this->db->or_like('user_username', $q);
    	$this->db->or_like('user_email', $q);
    	$this->db->or_like('email_verified_at', $q);
    	$this->db->or_like('user_password', $q);
        $this->db->or_like('user_remember_token', $q);
        $this->db->or_like('role_id', $q);
        $this->db->or_like('user_avatar', $q);
        $this->db->or_like('user_status', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('updated_at', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function validate($username){
        $this->db->where('user_username',$username);
        $result = $this->db->get($this->table,1);
        return $result;
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->user, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->user, $id);
        $this->db->delete($this->table);
        // echo 'Deleted successfully.';
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './assets/image/user_upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->user_id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "user.png";
    }

    // public function do_upload(){
    //         $config = array(
    //         'upload_path' => "./assets/image/user_upload/",
    //         'allowed_types' => "gif|jpg|png|jpeg|pdf",
    //         'overwrite' => TRUE,
    //         'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
    //         'max_height' => "768",
    //         'max_width' => "1024"
    //     );

    //     $this->load->library('upload', $config);
        
    //     if($this->upload->do_upload())
    //         {
    //             $data = array('upload_data' => $this->upload->data());
    //             $this->load->view('upload_success',$data);
    //         }
    //         else
    //         {
    //             $error = array('error' => $this->upload->display_errors());
    //             $this->load->view('custom_view', $error);
    //         }
    //     }


}