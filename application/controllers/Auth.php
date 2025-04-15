<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function doLogin()
    {
        $this->load->model('User_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->getByUsername($username);


        if ($user && $password == $user['password']) {
            $this->session->set_userdata('user', $user);
            redirect('transaksi');
        } else {
            $this->session->set_flashdata('error', 'Username/password salah!');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
