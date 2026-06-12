<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdiModel extends CI_Model {

    // JOIN ke tabel fakultas agar View bertema bisa menampilkan kolom "Fakultas" dengan teks nama, bukan angka ID
    public function getAll()
    {
        $this->db->select('prodi.*, fakultas.fakultas_name');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.fakultas_id = prodi.fakultas_id', 'left');
        return $this->db->get()->result_array();
    }

    // Mengambil satu data prodi berdasarkan ID
    public function getById($id)
    {
        return $this->db->get_where('prodi', ['prodi_id' => $id])->row_array();
    }

    // Menyimpan data prodi baru
    public function insert($data)
    {
        return $this->db->insert('prodi', $data);
    }

    // Mengupdate data prodi
    public function update($id, $data)
    {
        $this->db->where('prodi_id', $id);
        return $this->db->update('prodi', $data);
    }

    // Menghapus data prodi
    public function delete($id)
    {
        $this->db->where('prodi_id', $id);
        return $this->db->delete('prodi');
    }
}