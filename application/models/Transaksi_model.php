<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    protected $table = 'transaksi';

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getByUser($user_id)
    {
        return $this->db->get_where($this->table, ['user_id' => $user_id])->result_array();
    }


    public function find($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }


  
    public function store($id)
    {
        return $this->db->get_where($this->table, ['jenis' => $jenis])->row_array();
    }


    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
