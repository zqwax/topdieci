<?php
defined('APP') or die();

require_once "models/ModelLogin.php";

class ControllerLogin {
  public $view = "Login";
  private $model;

  public function __construct() {
    $this->model = new ModelLogin();
  }

  public function display($msg = null, $status = null) {
    if ($msg) {
      $_SESSION['msg'] = $msg;
      $_SESSION['status'] = $status;
    }
    include("views/ViewLogin.php");
  }

  public function login() {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
      $this->display("Email e password obbligatorie", "danger");
      return;
    }

    $this->model->email = $email;
    $hashed = $this->model->getPassword();

    if (!$hashed || !password_verify($password, $hashed)) {
      $this->display("Credenziali errate", "danger");
      return;
    }

    $_SESSION['userdata'] = $this->model->getUserData();
    header("Location: ?option=home");
    exit;
  }

  public function logout() {
    session_destroy();
    header("Location: ?option=home");
    exit;
  }
}
