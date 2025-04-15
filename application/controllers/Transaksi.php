<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->helper(['form', 'url']);
        
        // Cek session login
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function index()
    {
        $user = $this->session->userdata('user');

        if ($user['role'] == 'admin') {
            $data['transaksi'] = $this->Transaksi_model->getAll();
        } else {
            $data['transaksi'] = $this->Transaksi_model->getByUser($user['id']);
        }

        $this->load->view('transaksi/index', $data);
    }

    public function create()
    {
        $this->load->view('transaksi/create');
    }

    public function store()
    {
        $user = $this->session->userdata('user');

        $data = [
            'user_id'    => $user['id'],
            'jenis'      => $this->input->post('jenis'),
            'jumlah'     => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal'    => $this->input->post('tanggal'),
        ];

        $this->Transaksi_model->insert($data);
        redirect('transaksi');
    }

    public function edit($id)
    {
        $data['transaksi'] = $this->Transaksi_model->find($id);
        $this->load->view('transaksi/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'jenis'      => $this->input->post('jenis'),
            'jumlah'     => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal'    => $this->input->post('tanggal'),
        ];

        $this->Transaksi_model->update($id, $data);
        redirect('transaksi');
    }

    public function delete($id)
    {
        $this->Transaksi_model->delete($id);
        redirect('transaksi');
    }
}
