<?php
defined('APP') or die();
require_once "models/ModelHome.php";

class ControllerHome {
  public $view = "Home";
  private $model;

  public function __construct() {
    $this->model = new ModelHome();
  }

  public function display() {
    $top_items = $this->model->getTopItems();
    include("views/ViewHome.php");
  }

  public function vote() {
    if (!isset($_SESSION['userdata'])) {
      $_SESSION['msg'] = "Devi essere loggato per votare!";
      $_SESSION['status'] = "danger";
      header("Location: ?option=login");
      return;
    }

    $id_user = $_SESSION['userdata']['id_user'];
    $id_item = $_GET['id'] ?? null;

    if ($this->model->hasVoted($id_user, $id_item)) {
      $_SESSION['msg'] = "Hai già votato questo elemento.";
      $_SESSION['status'] = "danger";
    } else {
      $this->model->addVote($id_user, $id_item);
      $_SESSION['msg'] = "Voto registrato!";
      $_SESSION['status'] = "success";
    }

    header("Location: ?option=home");
  }
}
