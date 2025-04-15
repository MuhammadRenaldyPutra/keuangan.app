<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users'; // sesuaikan dengan nama tabelmu di DB

    public function getByUsername($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row_array();
    }
}
