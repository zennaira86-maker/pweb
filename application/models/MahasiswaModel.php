<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaModel extends CI_Model {
    public function getAll()
	{
        return $this->db->get('mahasiswa')->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('mahasiswa', ['mahasiswa_id' => $id])->row_array();
	}

	public function insert($data)
	{
		return $this->db->insert('mahasiswa', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('mahasiswa_id', $id);
		return $this->db->update('mahasiswa', $data);
	}

	public function delete($id)
	{
		$this->db->where('mahasiswa_id', $id);
		return $this->db->delete('mahasiswa');
	}

    public function checkAccount($formulir)
	{
		$this->db->where('mahasiswa_email', $formulir['email']);
		$this->db->where('mahasiswa_password', $formulir['password']); // Teks polos tanpa MD5
		
		$query = $this->db->get('mahasiswa');

		if ($query->num_rows() == 1) {
			$user = $query->row();
			$this->session->set_userdata('user', $user);
			return true;
		} else {
			return false;
		}
	}
}