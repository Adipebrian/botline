<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function populer()
    {
        $this->db->order_by('views','DESC');
        $this->db->where('status',1);
        $this->db->limit(6);
        return $this->db->get('blog_post');

    }
    function new()
    {
        $this->db->order_by('id','DESC');
        $this->db->where('status',1);
        $this->db->limit(6);
        return $this->db->get('blog_post');

    }
    function add_subs($email)
    {
        $data =
        [
            'email' => $email,
        ];
        $this->db->insert('blog_subs', $data);
    }

} 