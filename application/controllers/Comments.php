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
            echo json_encode($comments);
        }
    }

    function addCategory()
    {
        if ($this->session->userdata('LoggedIn')) {
            $category_input = trim($_POST['category_input']);

            $data = array('categories' => $category_input);
            $this->db->insert('reports_comments_categories', $data);

            $categories = $this->db->get('reports_comments_categories')->result();
            echo json_encode($categories);
        }
    }

    function deleteCategory($category_id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $category_id);
            $this->db->delete('reports_comments_categories');

            echo json_encode('Comment category deleted!');
        }
    }

    function deleteComment($comment_id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $this->db->where('id', $comment_id);
            $this->db->delete('reports_comments_bank');

            echo json_encode('Comment deleted!');
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

            echo json_encode('Comment edited!');
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