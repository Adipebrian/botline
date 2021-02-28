<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model', 'home');
		$this->load->model('Blog_model', 'blog');
	}
   public function index()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['cat_pop'] = $this->blog->cat_pop();
		$data['tag_pop'] = $this->blog->tag_pop();
        $data['pop'] = $this->home->populer()->result_array();
        $data['new'] = $this->home->new()->result_array();
        $this->load->view('home/index', $data); 
    }
    public function add_subs()
    {
        $email = $this->input->post('email');
        $this->home->add_subs($email);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih telah berlangganan dengan kami!</div>');
		redirect('home');
    }
}
