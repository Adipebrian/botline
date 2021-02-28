<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    function get_all_pesan($offset, $limit, $email)
    {
        $this->db->select('*');
        $this->db->where('email_to', $email);
        $this->db->order_by('status', 'asc');
        return $this->db->get('pesan', $offset, $limit);
    }
    function topbar_pesan()
    {
        $email = $this->session->userdata('email');
        $sts = 0;
        $this->db->select('*');
        $this->db->where('email_to', $email);
        $this->db->where('status', $sts);
        $this->db->order_by('status', 'asc');
        $this->db->limit(4);
        return $this->db->get('pesan');
    }
    function get_pesan_by_id($id)
    {
        $query = $this->db->get_where('pesan', array('id' => $id));
        return $query;
    }
    function update_status_by_id($id)
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('pesan', $data);
    }
    function delete_pesan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pesan');
    }
    function send_kembali($name_f, $name, $email, $pesan, $subject)
    {

        $data = [
            'name_from' => $name_f,
            'name_to' => $name,
            'email_to' => $email,
            'pesan' => $pesan,
            'pesan_subject' => $subject,
            'status' => 0,
            'date_created' => time(),
        ];
        $this->db->insert('pesan', $data);
    }
    function send($name_f, $name, $email, $pesan, $subject)
    {

        $data = [
            'name_from' => $name_f,
            'name_to' => $name,
            'email_to' => $email,
            'pesan' => $pesan,
            'pesan_subject' => $subject,
            'status' => 0,
            'date_created' => time(),
        ];
        $this->db->insert('pesan', $data);
    }
    function send_ijin($name_f, $name, $email, $pesan, $subject)
    {

        $data = [
            'name_from' => $name_f,
            'name_to' => $name,
            'email_to' => $email,
            'pesan' => $pesan,
            'pesan_subject' => $subject,
            'status' => 0,
            'date_created' => time(),
        ];
        $this->db->insert('pesan', $data);
    }
    function send_pinjam($nama_pinjam, $id_buku, $nama_buku)
    {
        $email = 'perpus@skensala.id';
        $name = 'Perpustakaan';
        $subject = 'Pesan Persetujuan';
        $base_url = "http://localhost/myclass/perpus/ijin/";
        $pesan = 'Saya ' . $nama_pinjam . ' Ijin Ingin Meminjam Buku ' . $nama_buku . ' dengan id buku ' . $id_buku . '<br><br> <a href="' . $base_url . '" class="btn btn-success mb-3">Ijinkan</a>';
        $data = [
            'name_from' => $nama_pinjam,
            'name_to' => $name,
            'email_to' => $email,
            'pesan' => $pesan,
            'pesan_subject' => $subject,
            'status' => 0,
            'date_created' => time(),
        ];
        $this->db->insert('pesan', $data);
    }
}
