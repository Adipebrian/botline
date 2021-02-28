<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model', 'blog');
		$this->load->library('upload');
		$this->load->library('pagination');
	}

	public function index()
	{
        $result = $this->input->post('result');
		$jum=$this->blog->get_blog();
	    $page=$this->uri->segment(3);
	    if(!$page):
	        $off = 0;
	    else:
	        $off = $page;
	    endif;
	    $limit=3;
	    $offset = $off > 0 ? (($off - 1) * $limit) : $off;
	    $config['base_url'] = base_url() . 'search/index/';
	    $config['total_rows'] = $jum->num_rows();
	    $config['per_page'] = $limit;
	    $config['uri_segment'] = 3;
	    $config['use_page_numbers']=TRUE;

	    //Tambahan untuk styling
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

	    
	    $this->pagination->initialize($config);
	    $data['page'] =$this->pagination->create_links();
		$blog = $this->blog->get_blog_result($offset,$limit,$result);
		if(empty($this->uri->segment(3))){
			$next_page=2;
			$data['canonical']=site_url('search');
			$data['url_prev']="";
		}elseif($this->uri->segment(3)=='1'){
			$next_page=2;
			$data['canonical']=site_url('search');
			$data['url_prev']=site_url('search');
		}elseif($this->uri->segment(3)=='2'){
			$next_page=$this->uri->segment(3)+1;
			$data['canonical']=site_url('search/index/'.$this->uri->segment(3));
			$data['url_prev']=site_url('search');
		}else{
			$next_page=$this->uri->segment(3)+1;
			$prev_page=$this->uri->segment(3)-1;
			$data['canonical']=site_url('search/index/'.$this->uri->segment(3));
			$data['url_prev']=site_url('search/index/'.$prev_page);
		}
             

        $data['blog'] = $blog;
        $data['result'] = $result;
		$data['cat_pop'] = $this->blog->cat_pop();
		$data['tag_pop'] = $this->blog->tag_pop();
		$data['title'] = 'Blog Resullt';
		$data['cat'] = $this->blog->cat_populer();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('desain/blog_header', $data);
		$this->load->view('desain/blog_navbar', $data);
		$this->load->view('blog/blog_search', $data);
		$this->load->view('desain/blog_footer', $data);
	}
	
	
}