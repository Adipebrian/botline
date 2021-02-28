<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	function get_blog_result($offset,$limit,$result)
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit,$offset);
		$this->db->like('title',$result);
		$query = $this->db->get('blog_post')->result_array();
		return $query;
	}
	function get_cat_result($offset,$limit,$slug)
	{
		$kueri = $this->db->get_where('blog_tag',['slug'=> $slug]);
        $n = $kueri->row_array();
        $name = $n['name'];
		
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit,$offset);
		$this->db->like('category',$name);
		$query = $this->db->get('blog_post')->result_array();
		return $query;
	}
	function get_tag_result($offset,$limit,$name)
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit,$offset);
		$this->db->like('tag',$name);
		$query = $this->db->get('blog_post')->result_array();
		return $query;
	}
	function tag_pop()
	{
		$this->db->order_by('id','Desc');
		$this->db->limit(4);
		return $this->db->get('blog_tag')->result_array();
	}
	function cat_pop()
	{
		$this->db->order_by('id','Desc');
		$this->db->limit(4);
		return $this->db->get('blog_category')->result_array();
	}
	function add_viewer($slug)
	{
		$kueri = $this->db->get_where('blog_post',['slug' => $slug]);
		$v = $kueri->row_array();
		$jum = $v['views'];
		$data = [
			'views' => $jum + 1
		];
		$this->db->where('slug',$slug);
		$this->db->update('blog_post',$data);
	}
	function detail_blog($slug)
	{
		return $this->db->get_where('blog_post',['slug' => $slug])->row_array();
	}
    function get_cat() 
    { 
        return $this->db->get('blog_category')->result_array();
    }
    function cat_populer() 
    { 
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
        return $this->db->get('blog_category')->result_array();
    }
    function get_tag()
    {
        return $this->db->get('blog_tag')->result_array();
    }
    function get_edit($id)
    { 
        return $this->db->get_where('blog_post',['id' => $id])->row_array();
    }
    function data()
    {
		$this->db->order_by('date_created','Desc');
        return $this->db->get('blog_post')->result_array();
    }
    function get_blog()
    {
        return $this->db->get('blog_post');
    }
	function get_blog_perpage($offset,$limit){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit,$offset);
		$query = $this->db->get('blog_post')->result_array();
		return $query;
	}
	function publish($id)
	{
		$data = [
			'status' => 1,
			];
	    $this->db->where('id',$id);
		$this->db->update('blog_post',$data);
	}
	function unpublish($id)
	{
		$data = [
			'status' => 0,
			];
	    $this->db->where('id',$id);
		$this->db->update('blog_post',$data);
	}
	function edit_cat($id,$name_cat,$cat_slug)
	{
		$data = [
			'cat_name' => $name_cat,
			'cat_slug' => $cat_slug,
		];
	    $this->db->where('id',$id);
		$this->db->update('blog_category',$data);
	}
	function delete_cat($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('blog_category');
	}
	function delete($id)
	{
	    $this->db->where('id',$id);
		$this->db->delete('blog_post');
	}
	function add_cat($name_cat,$cat_slug)
	{
		$data = [
			'cat_name' => $name_cat,
			'cat_slug' => $cat_slug,
		];
		$this->db->insert('blog_category',$data);
	}
	function add_tag($name_tag,$slug_tag)
	{
		$data = [
			'name' => $name_tag,
			'slug' => $slug_tag,
		];
      $this->db->insert('blog_tag',$data);
	}
	function edit_tag($id,$name_tag,$slug_tag)
	{
		$data = [
			'name' => $name_tag,
			'slug' => $slug_tag,
		];
		$this->db->where('id',$id);
		$this->db->update('blog_tag',$data);
	}
	function delete_tag($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('blog_tag');
	}
    function save_post($title,$contents,$category,$slug,$image,$tags){
		$data = array(
	        'title' 	   => $title,
	        'slug' 	   => $slug, 
	        'content'    => $contents,
	        'image' 	   => $image,
	        'category' => $category,
	        'tag' 	   => $tags,   
	        'views' 	   => 0,
	        'status' 	   => 0,
	        'date_created' 	   => time(),
	        'update_created' 	   => 0,
	        'user_id'	   => $this->session->userdata('id')
		);
		$this->db->insert('blog_post', $data);
	}
    function save_edit_image($id,$title,$contents,$category,$slug,$image,$tags){
		$time = time();
		$result = $this->db->query("UPDATE blog_post SET title='$title',content='$contents',image='$image',update_created='$time',category='$category',tag='$tags',slug='$slug' WHERE id='$id'");
		return $result;
	}
    function save_edit_noimage($id,$title,$contents,$category,$slug,$tags){
		$time = time();
		$result = $this->db->query("UPDATE blog_post SET title='$title',content='$contents',update_created='$time',category='$category',tag='$tags',slug='$slug' WHERE id='$id'");
		return $result;
	}

}