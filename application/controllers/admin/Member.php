<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }

    $this->load->model('admin/MMember');
  }

  function index() {
    // admin 계정은 제외한다.
    // 만일을 대비해서 권한을 변경할 수 없도록 한다.
    $view_params['member'] = $this->MMember->get_members();
    $view_params['season_list'] = $this->MMember->get_season_list();
    $view_params['auth_list'] = $this->MMember->get_auth_list();

    $this->load->view('admin/header');
    $this->load->view('admin/member', $view_params);
    $this->load->view('admin/footer');
  }

  function change_level() {
    if(!($this->input->post('user_level') > -1 && $this->input->post('user_id'))) {
      general_error_msg();
    }

    $user = $this->input->post('user_id');
    $level = $this->input->post('user_level');

    $data = array(
      'user_id' => $user
    , 'user_level' => $level
    );

    $this->MMember->update_level($data);

    redirect('admin/Member', 'refresh');
  }
}