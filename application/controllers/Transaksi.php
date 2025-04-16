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

        // Ambil data transaksi sesuai dengan role
        if ($user['role'] == 'admin') {
            $data['transaksi'] = $this->Transaksi_model->getAll();
        } else {
            $data['transaksi'] = $this->Transaksi_model->getByUser($user['id']);
        }

        // Hitung total pemasukan, pengeluaran, dan saldo
        $data['total_pemasukan'] = $this->Transaksi_model->getTotalPemasukan();
        $data['total_pengeluaran'] = $this->Transaksi_model->getTotalPengeluaran();
        $data['saldo'] = $data['total_pemasukan'] - $data['total_pengeluaran'];

        // Load view transaksi
        $this->load->view('transaksi/index', $data);
    }

    public function delete($id)
    {
    // Call the model's delete function with the ID
        $this->Transaksi_model->delete($id);
    
    // Redirect back to the transaksi page after deleting
        redirect('transaksi');
    }
    
    // public function edit($id)
    // {
    // // Call the model's delete function with the ID
    //     $this->Transaksi_model->update($id);
    
    // // Redirect back to the transaksi page after deleting
    //     redirect('transaksi');
    // }

    public function store()
{
    $user = $this->session->userdata('user');

    $data = [
        'user_id'    => $user['id'],
        'jenis'      => $this->input->post('jenis') == 'masuk' ? 'pemasukan' : 'pengeluaran',
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

    if (!$data['transaksi']) {
        show_404();
    }

    $this->load->view('transaksi/edit', $data);
}

public function update($id)
{
    $transaksi = $this->Transaksi_model->find($id);

    if (!$transaksi) {
        show_404();
    }

    $data = [
        'jenis'      => $this->input->post('jenis') == 'masuk' ? 'pemasukan' : 'pengeluaran',
        'jumlah'     => $this->input->post('jumlah'),
        'keterangan' => $this->input->post('keterangan'),
        'tanggal'    => $this->input->post('tanggal'),
    ];

    $this->Transaksi_model->update($id, $data);
    redirect('transaksi');
}

    public function create() {
        $this->load->view('transaksi/create');
    }
}
