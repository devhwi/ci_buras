<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }

    $this->load->model('MBoard');
    $this->load->library('pagination');
  }

  function index() {
    if($this->uri->segment(2)) {
      $category = $this->uri->segment(2);
    } else {
      general_error_msg();
    }

    $view_params['category_id'] = $category;
    $view_params['categories'] = $this->MBoard->get_categories();
    $view_params['category_name'] = $this->MBoard->get_category($category);
    $view_params['board_count'] = $this->MBoard->get_board_count($category);

    /* Pagination Configuration */
    $config['base_url'] = base_url().'Board/'.$category.'/page/';
    $config['total_rows'] = $view_params['board_count'];
    $config['per_page'] = 10;
    $config['num_links'] = 5;
    $config['first_url'] = '1';
    $config['uri_segment'] = 4;
    $config['use_page_numbers'] = TRUE;
    // pagination start/end
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    // next
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    // previous
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    // current page
    $config['cur_tag_open'] = '<li class="page-item"><a class="page-link"><b>';
    $config['cur_tag_close'] = '</b></a></li>';
    // other pages
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    // other pages attributes
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    if ($this->uri->segment(4) > 0) {
      $offset = ($this->uri->segment(4) + 0) * $config['per_page'] - $config['per_page'];
    } else {
      $offset = $this->uri->segment(4);
    }

    $view_params['board_list'] = $this->MBoard->get_board_list($category, $config['per_page'], $offset);

    $this->load->view('header');
    $this->load->view('board_list', $view_params);
    $this->load->view('footer');
  }

  function detail() {
    if(!($this->uri->segment(3))) {
      general_error_msg();
    }

    $board_id = $this->uri->segment(3);

    $view_params['detail'] = $this->MBoard->get_board_detail($board_id);
    $view_params['reply'] = $this->MBoard->get_reply($board_id);
    $view_params['reply_count'] = $this->MBoard->get_reply_count($board_id);

    $this->load->view('header');
    $this->load->view('board_detail', $view_params);
    $this->load->view('footer');
  }

  function write() {
    if(! $this->uri->segment(3) ) {
      general_error_msg();
    }

    $view_params['board_category'] = $this->uri->segment(3);
    $view_params['board_category_name'] = $this->MBoard->get_category($this->uri->segment(3));
    $view_params['board_notice'] = $this->uri->segment(3) == 1 ? 1 : 0;

    $this->load->view('header');
    $this->load->view('board_write', $view_params);
    $this->load->view('footer');
  }

  function write_check() {
    if(! $this->input->post() ) {
      general_error_msg();
    }

    $board_category = $this->input->post('board_category');
    $board_notice = $board_category == 1 ? 1 : 0;

    $data = array(
      'board_category' => $this->input->post('board_category'),
      'board_title' => $this->input->post('board_title'),
      'board_content' => nl2br($this->input->post('board_content')),
      'board_writer' => $this->session->userdata('user_id'),
      'board_dttm' => date('Y-m-d H:i:s'),
      'board_notice' => $board_notice,
      'board_seq' => $this->MBoard->get_max_seq_by_category($board_category)
    );

    if($this->MBoard->write_board($data)) {
      echo "<script>alert('작성되었습니다.');</script>";
    }else {
      echo "<script>alert('오류입니다. 관리자에게 문의해 주세요.');</script>";
    }

    redirect('Board/'.$board_category, 'refresh');
  }

  function edit() {
    if(! $this->uri->segment(3) ) {
      general_error_msg();
    }
    // user check
    // if( ! $this->session->userdata('user_id') == 1 )

    $view_params['board_category'] = $this->uri->segment(3);
    $view_params['board_category_name'] = $this->MBoard->get_category($this->uri->segment(3));
    $view_params['board_notice'] = $this->uri->segment(3) == 1 ? 1 : 0;

    $this->load->view('header');
    $this->load->view('board_write', $view_params);
    $this->load->view('footer');
  }
}
