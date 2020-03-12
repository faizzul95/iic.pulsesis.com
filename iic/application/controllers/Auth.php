<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller{

      function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('User_level_model');
        $this->load->library('session');
        $this->load->library('form_validation');   
    }
    
    public function index(){

        //load session library
        $this->load->library('session');

        //restrict users to go back to login if session has been set
        if($this->session->userdata('userid')){
            redirect('dashboard');
        }
        else{
            // $this->load->view('auth/login');
            $data = array(
                'username' => set_value('username'),
                'password' => set_value('password'),
            );

            $this->load->view('auth/login',$data);
        }
    }

    public function register(){
         //load session library
        $this->load->library('session');

        //restrict users to go back to login if session has been set
        if($this->session->userdata('userid')){
            redirect('dasboard');
        }
        else{
            $this->load->view('auth/register');
        }
    }

    public function checkAuthorization(){

    	$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else 
        { 
            $username  = $this->input->post('username',TRUE);
            $enteredPassword = $this->input->post('password', TRUE);

            $validate = $this->User_model->validate($username);
            if($validate->num_rows() > 0){
                $data  = $validate->row_array();
                $id  = $data['user_id'];
                $username  = $data['user_username'];
                $email = $data['user_email'];
                $token_remember = $data['user_remember_token'];
                $role_id = $data['role_id'];
                $user_password = $data['user_password']; 
                $avatar = $data['user_avatar'];
                $status = $data['user_status'];

                // get session level name
                $userlvlDetail = $this->User_level_model->get_session_data($role_id);
                $row = $userlvlDetail->row_array();
                $roleName = $row['role_name'];

                if (password_verify($enteredPassword, $user_password)) { 
                        if ($status == "active") {
                            $sesdata = array(
                            // 'userfname'  => $fname,
                            'userid'  => $id,
                            'roleid'=> $role_id,
                            'rolename'=> $roleName,
                            'useravatar'=> $avatar,
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($sesdata);
                         	redirect('dashboard');
                        }elseif($status == "inactive"){
                            echo $this->session->set_flashdata('login_error_message','Your ID is inactive, Please contact administrator');
                            redirect('auth');
                        }else{
                             redirect('auth');
                        }
                }else{
                    echo $this->session->set_flashdata('login_error_message','Authentication failed, Please Try Again');
                    redirect('auth');
                }
            }else{
                echo $this->session->set_flashdata('login_error_message','Authentication failed, Please Try Again');
                redirect('auth');
            }
        }
    }


    function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    function blockpage(){
        $this->load->view('errors/html/error_403');
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[25]');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}