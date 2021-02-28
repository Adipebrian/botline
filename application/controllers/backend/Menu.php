<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
   public function index()
    {
        $this->load->model('Pesan_model', 'pesan');
        $data['pesan'] = $this->pesan->topbar_pesan();
        $data['title'] = 'Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('desain/header', $data);
            $this->load->view('desain/sidebar', $data);
            $this->load->view('desain/topbar', $data);
            $this->load->view('backend/menu/index', $data);
            $this->load->view('desain/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $this->load->model('Pesan_model', 'pesan');
        $data['pesan'] = $this->pesan->topbar_pesan();
        $data['title'] = 'SubMenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('desain/header', $data);
            $this->load->view('desain/sidebar', $data);
            $this->load->view('desain/topbar', $data);
            $this->load->view('backend/menu/submenu', $data);
            $this->load->view('desain/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }
    public function updatedata()
    {
        $id = $this->input->post('id');
        $data = [
            'menu' => $this->input->post('update'),
        ];

        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Update Data ' . $this->input->post('menu') . ' berhasil!
          </div>');
        redirect('menu');
    }
    public function deletedata($id)
    {
        $this->db->delete('user_menu', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Berhasil!
          </div>');
        redirect('menu');
    }
    public function updatedata_sub()
    {
        $id = $this->input->post('id');
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Update Data ' . $this->input->post('title') . ' berhasil!
          </div>');
        redirect('menu/submenu');
    }
    public function deletedata_sub($id)
    {
        $this->db->delete('user_sub_menu', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Berhasil!
          </div>');
        redirect('menu/submenu');
    }
}
