<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table = 'tbl_lokasi';
    protected $allowedFields = ['id', 'nama_toko', 'alamat', 'lat', 'long', 'deskripsi'];

    function get_all_data()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    function insertdata($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function detail($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }

    public function update_toko($data, $id)
    {
        return $this->db->table($this->table)->update($data, array('id' => $id));
    }

    public function delete_toko($id)
    {
        return $this->db->table($this->table)->delete(array('id' => $id));
    }
}
