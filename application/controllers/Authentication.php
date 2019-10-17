<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
    
    public function index() {
        $msg = '';

		if (isset($_GET['m'])) {
			$msg = $_GET['m']; 
        }
        
        $data['msg'] = $msg;
        
        $this->load->view('login', $data);
    }

    public function verification() {
        $user = $this->input->post('username');
        $pass = sha1($this->input->post('password'));
        $auth = array(
            'user' => $user,
            'pass' => $pass
        );

        $this->load->model('user');
        $is_auth = $this->user->auth($auth);

        if ($is_auth > 0) {
            $data = array(
                'is_login' => true,
                'profile' => array(
                    'user' => $user
                )
            );

            $this->session->set_userdata($data);
            // var_dump($this->session->userdata()); exit();
            redirect('/');    
        }
        else {
            redirect('login/?m=error');
        }

    }

    public function signout() {
        $this->session->sess_destroy();
        redirect('/');
    }
}