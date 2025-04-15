<?php
namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['user_id', 'jenis', 'jumlah', 'keterangan', 'tanggal'];
    protected $useTimestamps = false;
}
