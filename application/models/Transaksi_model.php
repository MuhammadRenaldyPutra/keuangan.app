<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getByUser($user_id)
    {
        return $this->db->where('user_id', $user_id)->get('transaksi')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('transaksi', $data);
    }

    public function find($id)
    {
        return $this->db->where('id', $id)->get('transaksi')->row_array();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('transaksi', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('transaksi');
    }

    // Update sum query to use select_sum()
    public function getTotalPemasukan()
    {
        $this->db->select_sum('jumlah');
        $this->db->where('jenis', 'pemasukan');
        $query = $this->db->get('transaksi');
        $result = $query->row_array();
        return $result['jumlah'] ?? 0; // Return 0 if null
    }

    // Update sum query to use select_sum()
    public function getTotalPengeluaran()
    {
        $this->db->select_sum('jumlah');
        $this->db->where('jenis', 'pengeluaran');
        $query = $this->db->get('transaksi');
        $result = $query->row_array();
        return $result['jumlah'] ?? 0; // Return 0 if null
    }
}
