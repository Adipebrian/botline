<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pesan Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('desain/header', $data);
        $this->load->view('desain/sidebar', $data);
        $this->load->view('desain/topbar', $data);
        $this->load->view('backend/user/index', $data);
        $this->load->view('desain/footer');
    }
}