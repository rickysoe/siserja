<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kpr_model extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function get_data_by_username($username)
    {
        $query = $this->db->get_where('customer', array('username' => $username));
        return $query->row();
    }
    
    public function detail($id)
    {
        $query = $this->db->get_where('rumah', array('id_rumah' => $id))->result();
        return $query;
    }


    public function hapus_rumah($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function detail_customer($id)
    {
        $query = $this->db->get_where('customer', array('id_customer' => $id))->result();
        return $query;
    }
    public function got_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_customer($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }
  

    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db
            ->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('customer');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function cek_admin_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db
            ->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('admin');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ganti_password($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function download_pembayaran($id)
    {
        $query = $this->db->get_where('transaksi', array('id_booking' => $id));
        return $query->row_array();
    }
    
    public function dataGrafik()
    {
        return $this->db->query('SELECT jumlah_pembangunan,kode_type FROM rumah LIMIT 6')->result_array();
    }


}
