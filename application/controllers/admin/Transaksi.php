<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function index()
    {
        $data['transaksi'] = $this->db->query(" SELECT * FROM transaksi tr, rumah rm, customer cs WHERE tr.id_rumah=rm.id_rumah AND tr.id_customer=cs.id_customer")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('templates_admin/footer');
    }
    public function cek_pembayaran($id)

    {
        $where = array('id_booking' => $id);
        $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_booking='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/konfirmasi_pembayaran', $data);
        $this->load->view('templates_admin/footer');
    }

    public function dl_pembayaran()
    {
        $id                 = $this->input->post('id_booking');
        $status_pembayaran  = $this->input->post('status_pembayaran');

        $data = array('status_pembayaran' => $status_pembayaran);
        $where = array('id_booking' => $id);

        $this->kpr_model->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('flash', 'konfirmasi berhasil');
        redirect('admin/transaksi');
    }

    public function download_pembayaran($id)
    {
        $this->load->helper('download');
        $file_pembayaran = $this->kpr_model->download_pembayaran($id);
        $file = 'assets/upload/bukti_bayar/' . $file_pembayaran['bukti_pembayaran'];
        force_download($file, NULL);
    }
    
    public function transaksi_selesai($id)
    {
        $where = array('id_booking' => $id);
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_booking='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('templates_admin/footer');
    }
   public function transaksi_selesai_aksi()
    {
        $id_booking = $this->input->post('id_booking');
        $id_rumah = $this->input->post('id_rumah');
        $tgl_selesai = $this->input->post('tanggal_selesai');
        $tgl_checkout = $this->input->post('tgl_checkout');
        $status_pengembalian = $this->input->post('status_pengembalian');
        $status_sewa = $this->input->post('status_sewa');
        $denda = $this->input->post('denda');
        $total_denda = str_replace(',', '', $this->input->post('total_denda'));
        $total_denda = str_replace('.', '', $total_denda);

        $data = array(
            'tgl_checkout' => $tgl_checkout,
            'status_pengembalian' => $status_pengembalian,
            'status_sewa' => $status_sewa,
            'total_denda' => $total_denda
        );
        $where = array(
            'id_booking' => $id_booking
        );

        $this->kpr_model->update_data('transaksi', $data, $where);

        // Check if status_sewa is "selesai"
        if ($status_sewa == 'Selesai' && $status_pengembalian == 'Kembali') {
            $rumah_data = array(
                'status' => 1
            );
            $rumah_where = array(
                'id_rumah' => $id_rumah
            );
        
            $this->kpr_model->update_data('rumah', $rumah_data, $rumah_where);
        
            // Mengambil id_booking dari tabel transaksi
            $transaksi_data = array(
                'status_sewa' => 'Selesai',
                'status_pengembalian' => 'Kembali'
            );
            $transaksi_where = array(
                'id_booking' => $id_booking,
                'id_rumah' => $id_rumah,
                'id_customer' => $id_customer
            );
        
            $this->kpr_model->update_data('transaksi', $transaksi_data, $transaksi_where);
        }
        

        $this->session->set_flashdata('flash', 'Transaksi Sukses');
        redirect('admin/transaksi');
    }

    public function batal_transaksi($id)
    {
        $where = array('id_booking' => $id);
        $data = $this->kpr_model->got_where($where, 'transaksi')->row();

        $where2 = array('id_rumah'  => $data->id_rumah);
        $data2 = array('status'     => '1');

        $this->kpr_model->update_data('rumah', $data2, $where2);
        $this->kpr_model->hapus_rumah($where, 'transaksi');
        $this->session->set_flashdata('flash', 'Berhasil dibatalkan');
        redirect('admin/transaksi');
    }
}
