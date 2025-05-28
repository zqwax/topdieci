<?php
defined('APP') or die("Accesso negato");

class ModelLogin {
  private $dbm;
  public $email;

  public function __construct() {
    $this->dbm = new DBManager();
  }

  public function getPassword() {
    $sql = "SELECT password FROM users WHERE email = ?";
    $result = $this->dbm->one($sql, [$this->email]);
    return $result->password ?? "";
  }

  public function getUserData() {
    $sql = "SELECT id_user, name, email FROM users WHERE email = ?";
    return $this->dbm->one($sql, [$this->email], "assoc");
  }
}
