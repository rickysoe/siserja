<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_rumah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_admin');
    }

    public function index()
    {

        if ($this->session->userdata('nama_admin') == '') {
            $this->session->set_flashdata('flashhh', '<div class="alert alert-primary alert-dismissible fade show" role="alert"> Silahkan Login Terlebih Dahulu!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>

        </div> ');
            redirect('admin_auth/admin_login');
        }

        $data['rumah'] = $this->kpr_model->get_data('rumah')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_rumah', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataRumah()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataRumah');
        $this->load->view('templates_admin/footer');
    }

    public function proses_tambah_rumah()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambahDataRumah();
        } else {
            $kode_type = $this->input->post('kode_type');
            $deskripsi = $this->input->post('deskripsi');
            $ukuran = $this->input->post('ukuran');
            $warna = $this->input->post('warna');
            $alamat_rumah = $this->input->post('alamat_rumah');
            $status = $this->input->post('status');
            $harga = $this->input->post('harga');
            $denda = $this->input->post('denda');
            $jumlah_pembangunan = $this->input->post('jumlah_pembangunan');
            $gambar = $_FILES['gambar']['name'];
            // Menghapus koma dari nilai harga dan denda
            $harga = str_replace(',', '', $harga);
            $denda = str_replace(',', '', $denda);

            if ($gambar = '') {
            } else {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '1000000';
                $config['max_width'] = '1920';
                $config['max_height'] = '1080';
            }
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "gagal upload gambar";
            } else {
                $gambar = $this->upload->data('file_name');
            }

            $data = array(
                'kode_type' => $kode_type,
                'deskripsi' => $deskripsi,
                'ukuran' => $ukuran,
                'warna' => $warna,
                'alamat_rumah' => $alamat_rumah,
                'status' => $status,
                'harga' => $harga,
                'denda' => $denda,
                'jumlah_pembangunan' => $jumlah_pembangunan,
                'gambar' => $gambar,
            );

            $this->kpr_model->insert_data($data, 'rumah');
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('admin/data_rumah');
        }
    }

    public function update_rumah($id)
    {
        $where = array('id_rumah' => $id);
        $data['rumah'] = $this->db->get_where('rumah', $where)->result();
    
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_rumah', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function proses_update_rumah()
{
    $this->_rules();

    if ($this->form_validation->run() == false) {
        $this->update_rumah($this->input->post('id_rumah'));
    } else {
        $id = $this->input->post('id_rumah');
        $kode_type = $this->input->post('kode_type');
        $deskripsi = $this->input->post('deskripsi');
        $ukuran = $this->input->post('ukuran');
        $warna = $this->input->post('warna');
        $alamat_rumah = $this->input->post('alamat_rumah');
        $status = $this->input->post('status');
        $harga = $this->input->post('harga');
        $denda = $this->input->post('denda');
        $jumlah_pembangunan = $this->input->post('jumlah_pembangunan');
        $gambar = $_FILES['gambar']['name'];

        // Menghapus koma dari nilai harga dan denda
        $harga = str_replace(',', '', $harga);
        $denda = str_replace(',', '', $denda);

        if ($gambar == '') {
            $gambar = $this->input->post('gambar_lama');
        } else {
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1000000';
            $config['max_width'] = '1920';
            $config['max_height'] = '1080';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gagal upload";
            } else {
                $gambar = $this->upload->data('file_name');

                // Hapus gambar lama jika ada
                $gambar_lama = $this->input->post('gambar_lama');
                if ($gambar_lama && file_exists('./assets/upload/' . $gambar_lama)) {
                    unlink('./assets/upload/' . $gambar_lama);
                }
            }
        }

        $data = array(
            'kode_type' => $kode_type,
            'deskripsi' => $deskripsi,
            'ukuran' => $ukuran,
            'warna' => $warna,
            'alamat_rumah' => $alamat_rumah,
            'status' => $status,
            'harga' => $harga,
            'denda' => $denda,
            'jumlah_pembangunan' => $jumlah_pembangunan,
            'gambar' => $gambar,
        );

        $where = array('id_rumah' => $id);
        $this->kpr_model->update_data('rumah', $data, $where);
        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/data_rumah');
    }
}




    public function detail_rumah($id)
    {
        $detail = $this->kpr_model->detail($id);
        $data['detail'] = $detail;
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_rumah', $data);
        $this->load->view('templates_admin/footer');
    }

    public function hapus_rumah($id)
    {
        $where = array('id_rumah' => $id);
        $this->kpr_model->hapus_rumah($where, 'rumah');
        $this->session->set_flashdata('flash', 'Berhasil dihapus');
        redirect('admin/data_rumah');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_type', 'Kode type', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
        $this->form_validation->set_rules('warna', 'Warna', 'trim|required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('denda', 'Denda', 'trim|required');
        $this->form_validation->set_rules('jumlah_pembangunan', 'Jumlah Pembangunan', 'trim|required');
    }
}
