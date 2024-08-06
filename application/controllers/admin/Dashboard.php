<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('kpr_model');

    }

    public function index()
    {
        if ($this->session->userdata('nama_admin') == '') {
            $this->session->set_flashdata('flashhh', '<div class="alert alert-primary alert-dismissible fade show" role="alert">Silahkan Login Terlebih Dahulu!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>

        </div> ');
            redirect('admin_auth/admin_login');
        }

        $user = $this->session->userdata('id_customer');
        // var_dump($user);
        // die();
        $data['rumah'] = $this->kpr_model->get_data('rumah')->num_rows();
        $data['transaksi'] = $this->kpr_model->get_data('transaksi')->num_rows();
        $data['customer'] = $this->kpr_model->get_data('customer')->num_rows();
        $data['grafik'] = $this->kpr_model->dataGrafik();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
