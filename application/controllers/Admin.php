<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(['form', 'url']);

        // Cek session login dan apakah user adalah admin
        if (!$this->session->userdata('user') || $this->session->userdata('user')['role'] != 'admin') {
            redirect('login');
        }
    }

    public function index()
    {
        // Ambil semua data user
        $data['users'] = $this->User_model->getAll();
        // Load view daftar user
        $this->load->view('admin/users/index', $data);
    }

    public function createUser()
    {
        // Tampilan form tambah user
        $this->load->view('admin/users/create');
    }

    public function storeUser()
    {
        // Proses simpan user baru
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        ];

        // Simpan ke database
        if ($this->User_model->insert($data)) {
            redirect('admin');
        } else {
            echo 'Gagal menambahkan user';
        }
    }

    public function editUser($id)
    {
        // Ambil data user untuk diedit
        $data['user'] = $this->User_model->find($id);
        $this->load->view('admin/users/edit', $data);
    }

    public function updateUser($id)
    {
        // Proses update data user
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        ];

        if ($this->User_model->update($id, $data)) {
            redirect('admin');
        } else {
            echo 'Gagal mengupdate user';
        }
    }

    public function deleteUser($id)
    {
        // Hapus user berdasarkan ID
        if ($this->User_model->delete($id)) {
            redirect('admin');
        } else {
            echo 'Gagal menghapus user';
        }
    }
}
