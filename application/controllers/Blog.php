<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
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
		$jum=$this->blog->get_blog();
	    $page=$this->uri->segment(3);
	    if(!$page):
	        $off = 0;
	    else:
	        $off = $page;
	    endif;
	    $limit=3;
	    $offset = $off > 0 ? (($off - 1) * $limit) : $off;
	    $config['base_url'] = base_url() . 'blog/index/';
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
		$data['blog']=$this->blog->get_blog_perpage($offset,$limit);
		if(empty($this->uri->segment(3))){
			$next_page=2;
			$x['canonical']=site_url('blog');
			$x['url_prev']="";
		}elseif($this->uri->segment(3)=='1'){
			$next_page=2;
			$x['canonical']=site_url('blog');
			$x['url_prev']=site_url('blog');
		}elseif($this->uri->segment(3)=='2'){
			$next_page=$this->uri->segment(3)+1;
			$x['canonical']=site_url('blog/index/'.$this->uri->segment(3));
			$x['url_prev']=site_url('blog');
		}else{
			$next_page=$this->uri->segment(3)+1;
			$prev_page=$this->uri->segment(3)-1;
			$x['canonical']=site_url('blog/index/'.$this->uri->segment(3));
			$x['url_prev']=site_url('blog/index/'.$prev_page);
		}
		$data['cat_pop'] = $this->blog->cat_pop();
		$data['tag_pop'] = $this->blog->tag_pop();
		$data['title'] = 'Blog Posts';
		$data['cat'] = $this->blog->cat_populer();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('desain/blog_header', $data);
		$this->load->view('desain/blog_navbar', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('desain/blog_footer', $data);
	}
	public function blog()
	{
		$jum=$this->blog->get_blog();
	    $page=$this->uri->segment(3);
	    if(!$page):
	        $off = 0;
	    else:
	        $off = $page;
	    endif;
	    $limit=2;
	    $offset = $off > 0 ? (($off - 1) * $limit) : $off;
	    $config['base_url'] = base_url() . 'blog/index/';
	    $config['total_rows'] = $jum->num_rows();
	    $config['per_page'] = $limit;
	    $config['uri_segment'] = 3;
	    $config['use_page_numbers']=TRUE;

	    //Tambahan untuk styling
        $config['full_tag_open']    = '<div class="row"><nav class="page-pagination mt-60"><ul class="page-numbers">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li><span class="page-numbers">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li><span class="page-numbers current">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li><span class="page-numbers">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li><span class="page-numbers">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li><span class="page-numbers">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li><span class="page-numbers">';
        $config['last_tagl_close']  = '</span></li>';

	    $config['first_link'] = '<';
	    $config['last_link'] = '>';
	    $config['next_link'] = '>>';
	    $config['prev_link'] = '<<';
	    $this->pagination->initialize($config);
	    $data['page'] =$this->pagination->create_links();
		$data['blog']=$this->blog->get_blog_perpage($offset,$limit);
		if(empty($this->uri->segment(3))){
			$next_page=2;
			$x['canonical']=site_url('blog');
			$x['url_prev']="";
		}elseif($this->uri->segment(3)=='1'){
			$next_page=2;
			$x['canonical']=site_url('blog');
			$x['url_prev']=site_url('blog');
		}elseif($this->uri->segment(3)=='2'){
			$next_page=$this->uri->segment(3)+1;
			$x['canonical']=site_url('blog/index/'.$this->uri->segment(3));
			$x['url_prev']=site_url('blog');
		}else{
			$next_page=$this->uri->segment(3)+1;
			$prev_page=$this->uri->segment(3)-1;
			$x['canonical']=site_url('blog/index/'.$this->uri->segment(3));
			$x['url_prev']=site_url('blog/index/'.$prev_page);
		}
		
		$data['title'] = 'Blog Posts';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('desain/header', $data);
		$this->load->view('desain/sidebar', $data);
		$this->load->view('desain/topbar', $data); 
		$this->load->view('blog/index', $data);
		$this->load->view('desain/footer', $data);
	}
	public function detail($slug)
	{
		$data['title'] = 'Blog Detail';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['blog'] = $this->blog->detail_blog($slug);
		$data['cat'] = $this->blog->cat_populer();
		$data['cat_pop'] = $this->blog->cat_pop();
		$data['tag_pop'] = $this->blog->tag_pop();

		$this->load->view('desain/blog_header', $data);
		$this->load->view('desain/blog_navbar', $data);
		$this->load->view('blog/detail_blog', $data);
		$this->load->view('desain/blog_sidebar', $data);
		$this->load->view('desain/blog_footer', $data);
		$this->blog->add_viewer($slug);
	}
	public function data()
	{
		$data['title'] = 'Data Blog';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['blog'] = $this->blog->data();
		$this->load->view('desain/header', $data);
		$this->load->view('desain/sidebar', $data);
		$this->load->view('desain/topbar', $data);
		$this->load->view('blog/data', $data);
		$this->load->view('desain/footer', $data);
	}
	public function add()
	{
		$this->load->model('Blog_model', 'blog');

		$data['title'] = 'Add New Post';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cat'] = $this->blog->get_cat();
		$data['tag'] = $this->blog->get_tag();

		$this->load->view('desain/header', $data);
		$this->load->view('desain/sidebar', $data);
		$this->load->view('desain/topbar', $data);
		$this->load->view('blog/add', $data);
		$this->load->view('desain/footer', $data);
	}
	public function add_tag()
	{

		$data['title'] = 'Add Tag';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tag'] = $this->blog->get_tag();

		$this->load->view('desain/header', $data);
		$this->load->view('desain/sidebar', $data);
		$this->load->view('desain/topbar', $data);
		$this->load->view('blog/add_tag', $data);
		$this->load->view('desain/footer', $data);
	}
	public function add_tag_form()
	{
		$name_tag  = strip_tags(htmlspecialchars($this->input->post('name_tag', TRUE), ENT_QUOTES));
		$slug_tag  = strip_tags(htmlspecialchars($this->input->post('slug_tag', TRUE), ENT_QUOTES));
		
		$this->blog->add_tag($name_tag,$slug_tag);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add Data berhasil!</div>');
		redirect('blog/add_tag');
	}
	public function edit_tag_form()
	{
		$id = $this->input->post('id');
		$name_tag  = strip_tags(htmlspecialchars($this->input->post('name_tag', TRUE), ENT_QUOTES));
		$slug_tag  = strip_tags(htmlspecialchars($this->input->post('slug_tag', TRUE), ENT_QUOTES));
		
		$this->blog->edit_tag($id,$name_tag,$slug_tag);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Data berhasil!</div>');
		redirect('blog/add_tag');
	}
	public function add_cat()
	{

		$data['title'] = 'Add Category';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cat'] = $this->blog->get_cat();

		$this->load->view('desain/header', $data);
		$this->load->view('desain/sidebar', $data);
		$this->load->view('desain/topbar', $data);
		$this->load->view('blog/add_cat', $data);
		$this->load->view('desain/footer', $data);
	}
	public function add_cat_form()
	{
		$name_cat  = strip_tags(htmlspecialchars($this->input->post('name_cat', TRUE), ENT_QUOTES));
		$cat_slug  = strip_tags(htmlspecialchars($this->input->post('cat_slug', TRUE), ENT_QUOTES));
		
		$this->blog->add_cat($name_cat,$cat_slug);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add Data berhasil!</div>');
		redirect('blog/add_cat');
	}
	public function delete_tag()
	{
		
		$id = $this->input->post('id');
		
		
		$this->blog->delete_tag($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data berhasil!</div>');
		redirect('blog/add_tag');
	}
	public function edit_cat_form()
	{
		$name_cat  = strip_tags(htmlspecialchars($this->input->post('name_cat', TRUE), ENT_QUOTES));
		$cat_slug  = strip_tags(htmlspecialchars($this->input->post('cat_slug', TRUE), ENT_QUOTES));
		$id = $this->input->post('id');
		
		
		$this->blog->edit_cat($id,$name_cat,$cat_slug);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Data berhasil!</div>');
		redirect('blog/add_cat');
	}
	public function delete_cat()
	{
		
		$id = $this->input->post('id');
		
		
		$this->blog->delete_cat($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data berhasil!</div>');
		redirect('blog/add_cat');
	}
	public function edit($id)
	{

		$data['title'] = 'Edit Post';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['blog'] = $this->blog->get_edit($id);
		$data['cat'] = $this->blog->get_cat();
		$data['tag'] = $this->blog->get_tag();

		$this->load->view('desain/header', $data);
		$this->load->view('desain/sidebar', $data);
		$this->load->view('desain/topbar', $data);
		$this->load->view('blog/edit', $data);
		$this->load->view('desain/footer', $data);
	}
	public function publish()
	{
		$id = $this->input->post('id');

		$this->blog->publish($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Publish berhasil!</div>');
		redirect('blog/data');
	}
	public function unpublish()
	{
		$id = $this->input->post('id');

		$this->blog->unpublish($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unpublish berhasil!</div>');
		redirect('blog/data');
	}
	public function delete()
	{
		$id = $this->input->post('id');

		$this->blog->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data berhasil!</div>');
		redirect('blog/data');
	}
	public function add_draft()
	{

		$config['upload_path'] = './assets/images/blog/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$img = $this->upload->data();

				$image = $img['file_name'];
				$title	  = strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES));
				$contents = $this->input->post('contents');
				$category = $this->input->post('category', TRUE);

				$slug  = strip_tags(htmlspecialchars($this->input->post('slug', TRUE), ENT_QUOTES));


				$xtags[] = $this->input->post('tag');
				foreach ($xtags as $tag) {
					$tags = @implode(",", $tag);
				}


				$this->blog->save_post($title, $contents, $category, $slug, $image, $tags);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil tersimpan!</div>');
				redirect('blog/data');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed!</div>');
				redirect('blog/data');
			}
		} else {
			redirect('blog/data');
		}
	}
	public function edit_post()
	{
		$config['upload_path'] = './assets/images/blog/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$img = $this->upload->data();

				$image = $img['file_name'];
				$id = $this->input->post('id');
				$title	  = strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES));
				$contents = $this->input->post('contents');
				$category = $this->input->post('category', TRUE);

				$slug  = strip_tags(htmlspecialchars($this->input->post('slug', TRUE), ENT_QUOTES));
				

				$xtags[] = $this->input->post('tag');
				foreach ($xtags as $tag) {
					$tags = @implode(",", $tag);
				}
				
				
				$this->blog->save_edit_image($id,$title, $contents, $category, $slug, $image, $tags);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit berhasil!</div>');
				redirect('blog/data');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed!</div>');
				redirect('blog/data');
			}
		} else {
			$id = $this->input->post('id');
			$title	  = strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES));
			$contents = $this->input->post('contents');
			$category = $this->input->post('category', TRUE);

			$slug  = strip_tags(htmlspecialchars($this->input->post('slug', TRUE), ENT_QUOTES));


			$xtags[] = $this->input->post('tag');
			foreach ($xtags as $tag) {
				$tags = @implode(",", $tag);
			}


			$this->blog->save_edit_noimage($id,$title, $contents, $category, $slug, $tags);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit berhasil!</div>');
			redirect('blog/data');
		}
	}
	//upload image summernote
	public function upload_image()
	{
		if (isset($_FILES["file"]["name"])) {
			$config['upload_path'] = './assets/images/blog/insert/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				echo base_url() . 'assets/images/blog/insert/' . $data['file_name'];
			}
		}
	}
}
