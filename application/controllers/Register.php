<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {

        $this->load->view('templates_admin/header');
        $this->load->view('customer_auth/register_form');
        // $this->load->view('templates_admin/footer');
    }

    public function daftar()
    {
    $this->_rules();

    if ($this->form_validation->run() == false) {
        // Validasi gagal, tampilkan pesan error
        $errors = $this->form_validation->error_array();
        print_r($errors); // Menampilkan pesan error dalam bentuk array

        $this->load->view('templates_admin/header');
        $this->load->view('customer_auth/register_form');
        // $this->load->view('templates_admin/footer');
    } else {
        $nama = $this->input->post('nama');
        $no_telepon = $this->input->post('no_telepon');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $no_ktp = $this->input->post('no_ktp');
        $foto_ktp = $_FILES['foto_ktp']['name'];

        // cek username exist
        $existing_user = $this->kpr_model->get_data_by_username($username);
        if ($existing_user) {
            $this->session->set_flashdata('flash_username', 'Username sudah didaftarkan');
            redirect('register');
        }

        // Mengunggah file foto_ktp
        $config['upload_path'] = './assets/upload/foto_ktp_customer/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)
        $config['file_name'] = 'foto_ktp_' . time(); // Nama file baru

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_ktp')) {
            $error = $this->upload->display_errors();
            // Handle kesalahan unggahan file
            echo $error;
            die();
        }

        $foto_ktp_data = $this->upload->data();
        $foto_ktp_name = $foto_ktp_data['file_name'];

        // Simpan data ke database
        $data = array(
            'nama' => $nama,
            'no_telepon' => $no_telepon,
            'username' => $username,
            'password' => $password,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'no_ktp' => $no_ktp,
            'foto_ktp' => $foto_ktp_name
        );

        $this->kpr_model->insert_data($data, 'customer');
        $this->session->set_flashdata('flash_success', 'Register Berhasil');
        redirect('customer_auth/login');
    }
}


    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'No Telpon', 'trim|required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    }

}
