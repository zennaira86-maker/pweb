<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('FakultasModel');
        $this->load->model('ProdiModel');
    }

    public function index()
    {
        $data['title'] = 'Fakultas';
        $data['fakultas'] = $this->FakultasModel->getAll();
        
        $this->load->view('layout/header', $data);
        $this->load->view('fakultas/index', $data);
        $this->load->view('layout/footer');
    }

public function tambah()
    {
        // Set konfigurasi validasi form
        $this->form_validation->set_rules('fakultas_id', 'ID Fakultas', 'required|numeric|is_unique[fakultas.fakultas_id]');
        $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'required|min_length[3]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Data Fakultas';
            $data['action'] = base_url('fakultas/tambah');
            $data['button'] = 'Simpan';
            $data['fakultas'] = null; 

            $this->load->view('layout/header', $data); 
            $this->load->view('fakultas/form', $data);
            $this->load->view('layout/footer');
        } else {
            $insert_data = [
                'fakultas_id'   => $this->input->post('fakultas_id'),
                'fakultas_name' => $this->input->post('fakultas_name')
            ];
            
            $this->FakultasModel->insert($insert_data);
            
            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data Fakultas berhasil ditambahkan.'
            ]);
            redirect('fakultas');
        }
    }

    public function ubah($id)
    {
        $fakultas = $this->FakultasModel->getById($id);
        if (!$fakultas) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data fakultas tidak ditemukan.'
            ]);
            redirect('fakultas');
        }

        $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'required|min_length[3]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Update Data Fakultas';
            $data['action'] = base_url('fakultas/ubah/' . $id);
            $data['button'] = 'Update';
            $data['fakultas'] = $fakultas; 

            $this->load->view('layout/header', $data); 
            $this->load->view('fakultas/form', $data);
            $this->load->view('layout/footer');
        } else {
            $update_data = [
                'fakultas_name' => $this->input->post('fakultas_name')
            ];

            $this->FakultasModel->update($id, $update_data);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data Fakultas berhasil diperbarui.'
            ]);
            redirect('fakultas');
        }
    }

    public function hapus($id)
    {
        // Cek data sebelum dihapus
        $fakultas = $this->FakultasModel->getById($id);
        if (!$fakultas) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data tidak ditemukan.'
            ]);
            redirect('fakultas');
        }

        // Hapus data
        $this->FakultasModel->delete($id);
        
        $this->session->set_flashdata('swal', [
            'icon'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Data Fakultas berhasil dihapus.'
        ]);
        redirect('fakultas');
    }
}