<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLogin extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function check_id_password($id, $pw) {

    // md5 encryption
    $md5_pw = md5($pass);

    $sql = "SELECT *
            FROM user
            WHERE user_id = '$id'
            AND user_password = '$md5_pw'";
    $query = $this->db->query($sql);
    if($query->num_rows()) {
      foreach($query->result() as $row)
        return $row;
    }
    return NULL;
  }
}
