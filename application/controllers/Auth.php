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
            if ($user['role'] == 'admin') {
                redirect('admin/users');
            } else {
                redirect('transaksi');
            }
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function register()
{
    $this->load->view('auth/register');
}

public function doRegister()
{
    $this->load->model('User_model');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $confirm_password = $this->input->post('confirm_password');

    if ($password !== $confirm_password) {
        $this->session->set_flashdata('error', 'Password dan konfirmasi tidak cocok!');
        redirect('register');
    }

    // Cek jika username sudah ada
    if ($this->User_model->getByUsername($username)) {
        $this->session->set_flashdata('error', 'Username sudah digunakan!');
        redirect('register');
    }

    // Simpan user baru
    $this->User_model->insert([
        'username' => $username,
        'password' => $password // Untuk keamanan, gunakan hash!
    ]);

    $this->session->set_flashdata('error', 'Berhasil daftar! Silakan login.');
    redirect('login');
}
}
