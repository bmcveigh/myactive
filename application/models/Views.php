<?php

class Views_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();
  }

  public function get_view($key)
  {
    $query = $this->db->query('SELECT * FROM views WHERE key = ?', $key);
    return $query;
  }
}
