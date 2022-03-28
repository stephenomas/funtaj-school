<?php defined('BASEPATH') OR die('No direct script access allowed!');

class Comments extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->data['pageTitle'] = 'Comment Bank';
    
            $this->data['comments'] = $this->db->get('reports_comments_bank')->result();

            $this->db->order_by('categories');
            $this->data['categories'] = $this->db->get('reports_comments_categories')->result();

          $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/scores/comment_bank', $this->data);
          $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function addComment()
    {
        if ($this->session->userdata('LoggedIn')) {     
            $comment_input = trim($_POST['comment_input']);
            $category_input = trim($_POST['category_input']);

            $data = array('comments' => $comment_input, 'categories' => $category_input);
            $this->db->insert('reports_comments_bank', $data);

            $comments = $this->db->get('reports_comments_bank')->result();
            $this->session->set_flashdata('success', 'comment added successfully');
            redirect('/comments');
            
        }
    }

    function addCategory()
    {
        if ($this->session->userdata('LoggedIn')) {
            $category_input = trim($_POST['category_input']);

            $data = array('categories' => $category_input);
            $this->db->insert('reports_comments_categories', $data);

            $categories = $this->db->get('reports_comments_categories')->result();
            $this->session->set_flashdata('success', 'category added successfully');
            redirect('/comments');
        }
    }

    function deleteCategory($category_id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $category_id);
            $this->db->delete('reports_comments_categories');
            $this->session->set_flashdata('success', 'category deleted successfully');
            redirect('/comments');
        }
    }

    function deleteComment($comment_id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $comment_id);
            $this->db->delete('reports_comments_bank');

            $this->session->set_flashdata('success', 'comment deleted successfully');
            redirect('/comments');
        }
    }

    function editComment($comment_id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $comment = trim($_POST['comment']);
            $category_input = trim($_POST['category_input']);

            $data = array('comments' => $comment, 'categories' => $category_input);

            $this->db->where('id', $comment_id);
            $this->db->update('reports_comments_bank', $data);

            $this->session->set_flashdata('success', 'comment updated successfully');
            redirect('/comments');
        }
    }

    function editCategory($category_id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $category = trim($_POST['category']);

            $data = array('categories' => $category);

            $this->db->where('id', $category_id);
            $this->db->update('reports_comments_categories', $data);

            echo json_encode('Category edited!');
        }
    }

    function getAllComments(){
        $comments = $this->db->get('reports_comments_bank')->result();

        $this->db->order_by('categories');
        $categories = $this->db->get('reports_comments_categories')->result();
        echo json_encode(array('comments' => $comments, 'categories' => $categories));
    }

    function getAllCategories(){
        $this->db->order_by('categories');
        $categories = $this->db->get('reports_comments_categories')->result();
        echo json_encode($categories);
    }
}