<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    protected $table = 'users'; // sesuaikan dengan nama tabelmu di DB

    public function getByUsername($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getAll()
{
    return $this->db->get($this->table)->result_array();
}

public function find($id)
{
    return $this->db->get_where($this->table, ['id' => $id])->row_array();
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
