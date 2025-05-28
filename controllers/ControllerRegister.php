<?php
defined('APP') or die();

require_once "models/ModelRegister.php";

class ControllerRegister {
  public $view = "Register";
  private $model;

  public function __construct() {
    $this->model = new ModelRegister();
  }

  public function display($msg = null, $status = null) {
    if ($msg) {
      $_SESSION['msg'] = $msg;
      $_SESSION['status'] = $status;
    }
    include("views/ViewRegister.php");
  }

  public function registerUser() {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';
    $confirm = $_POST['password_confirm'] ?? '';

    if (!$name || !$email || !$pass || !$confirm) {
      $this->display("Tutti i campi sono obbligatori", "danger");
      return;
    }

    if ($pass !== $confirm) {
      $this->display("Le password non corrispondono", "danger");
      return;
    }

    if ($this->model->exists($email)) {
      $this->display("Utente già registrato", "danger");
      return;
    }

    $this->model->createUser($name, $email, password_hash($pass, PASSWORD_DEFAULT));
    $this->display("Registrazione avvenuta con successo! Ora puoi effettuare il login.", "success");
  }
}
