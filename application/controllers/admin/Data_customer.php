<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kpr_model');
    }

    public function index()
    {
        $data['customer'] = $this->kpr_model->get_data('customer')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_customer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_customer()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_customer');
        $this->load->view('templates_admin/footer');
    }
    public function proses_tambah_customer()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah_customer();
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $no_telepon = $this->input->post('no_telepon');
            $no_ktp = $this->input->post('no_ktp');
            $password = md5($this->input->post('password'));

            // Handle the uploaded KTP photo
            $config['upload_path'] = './assets/upload/foto_ktp_customer/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)
            $config['file_name'] = 'foto_ktp_' . time(); // Nama file baru

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_ktp')) {
                $upload_data = $this->upload->data();
                $foto_ktp = $upload_data['file_name'];

                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'alamat' => $alamat,
                    'jenis_kelamin' => $jenis_kelamin,
                    'no_telepon' => $no_telepon,
                    'no_ktp' => $no_ktp,
                    'password' => $password,
                    'foto_ktp' => $foto_ktp,
                );

                $this->kpr_model->insert_data($data, 'customer');
                $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
                redirect('admin/data_customer');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('admin/data_customer');
            }
        }
    }

    public function update_customer($id)
    {
        $where = array(
            'id_customer' => $id,
        );
        $data['customer'] = $this->db->query("SELECT * from customer WHERE id_customer='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_customer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_customer($id)
    {
        $detail = $this->kpr_model->detail_customer($id);
        $data['detail'] = $detail;
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_customer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function hapus_customer($id)
    {
        $where = array('id_customer' => $id);
        $this->kpr_model->hapus_rumah($where, 'customer');
        $this->session->set_flashdata('flash', 'Berhasil dihapus');
        redirect('admin/data_customer');
    }

    public function proses_update_customer()
{
    $this->_rules();

    if ($this->form_validation->run() == false) {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_customer');
        $this->load->view('templates_admin/footer');
    } else {
        $id = $this->input->post('id_customer');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_telepon = $this->input->post('no_telepon');
        $no_ktp = $this->input->post('no_ktp');
     
        // Cek apakah ada foto yang diunggah
        if ($_FILES['foto_ktp']['name']) {
            $config['upload_path'] = './assets/upload/foto_ktp_customer/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048'; // 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_ktp')) {
                $foto_ktp = $this->upload->data('file_name');

                // Hapus foto KTP lama jika ada
                $customer = $this->kpr_model->get_data('customer', ['id_customer' => $id])->row();
                if ($customer->foto_ktp) {
                    $foto_lama = './assets/upload/foto_ktp_customer/' . $customer->foto_ktp;
                    if (file_exists($foto_lama)) {
                        unlink($foto_lama);
                    }
                }
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('admin/form_update_customer');
            }
        } else {
            // Jika tidak ada foto yang diunggah, tetap menggunakan foto KTP lama
            $customer = $this->kpr_model->get_data('customer', ['id_customer' => $id])->row();
            $foto_ktp = $customer->foto_ktp;
        }

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'no_telepon' => $no_telepon,
            'no_ktp' => $no_ktp,
            'foto_ktp' => $foto_ktp,
        );
        $where = array(
            'id_customer' => $id,
        );
        $this->kpr_model->update_data('customer', $data, $where);
        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/data_customer');
    }
}

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No. KTP', 'required|trim');
    }
    
}
