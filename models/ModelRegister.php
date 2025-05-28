<?php
defined('APP') or die();

class ModelRegister {
  private $dbm;

  public function __construct() {
    $this->dbm = new DBManager();
  }

  public function exists($email) {
    $sql = "SELECT id_user FROM users WHERE email = ?";
    $result = $this->dbm->one($sql, [$email]);
    return !empty($result);
  }

  public function createUser($name, $email, $hash) {
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $this->dbm->pex($sql, [$name, $email, $hash]);
  }
}
