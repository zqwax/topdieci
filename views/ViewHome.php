<?php
defined('APP') or die();

class ModelHome {
  private $dbm;

  public function __construct() {
    $this->dbm = new DBManager();
  }

  public function getTopItems() {
    $sql = "SELECT id_item, name, votes FROM items ORDER BY votes DESC LIMIT 10";
    return $this->dbm->query($sql);
  }

  public function hasVoted($id_user, $id_item) {
    $sql = "SELECT id_vote FROM votes WHERE id_user = ? AND id_item = ?";
    return $this->dbm->one($sql, [$id_user, $id_item]);
  }

  public function addVote($id_user, $id_item) {
    $this->dbm->pex("INSERT INTO votes (id_user, id_item) VALUES (?, ?)", [$id_user, $id_item]);
    $this->dbm->pex("UPDATE items SET votes = votes + 1 WHERE id_item = ?", [$id_item]);
  }
}
