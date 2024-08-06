<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_auth extends CI_Controller
{

    public function admin_login()
    {

        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('admin_auth/form_login_admin');
            // $this->load->view('templates_admin/footer');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $cek = $this->kpr_model->cek_admin_login($username, $password);

            if ($cek == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert"> Silahkan Login Terlebih Dahulu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>

            </div> ');
                redirect('admin_auth/admin_login');
            } else {
                $this->session->set_userdata('nama_admin', $cek->nama_admin);
                $this->session->set_userdata('id_admin', $cek->id_admin);
                $this->session->set_userdata('username', $cek->username);

                redirect('admin/dashboard');

            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('customer/dashboard');
    }

    public function ganti_password()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('admin_auth/form_gantipass');
    }
    public function ganti_password_aksi()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi password', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('password_mismatch', true); 
            $this->load->view('templates_admin/header');
            $this->load->view('admin_auth/form_gantipass');
        } else {
            $data = array('password' => md5($pass_baru));
            $id = array('id_admin' => $this->session->userdata('id_admin'));

            $this->kpr_model->ganti_password($id, $data, 'admin');

            $this->session->set_flashdata('flash', 'Password berhasil di ganti silahkan Login   !!');

            redirect('admin_auth/admin_login');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', 'trims');
        $this->form_validation->set_rules('password', 'Password', 'required', 'trims');
    }
}
