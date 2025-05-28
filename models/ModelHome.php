<?php
defined('APP') or die("Accesso negato");

class ModelHome
{
    private $dbm;

    public function __construct()
    {
        $this->dbm = new DBManager();
    }

    // Restituisce i 10 elementi più votati
    public function getTopItems()
    {
        $sql = "SELECT ti.id_item, ti.name, COUNT(v.id_vote) AS votes
                FROM top_items ti
                LEFT JOIN votes v ON ti.id_item = v.id_item
                GROUP BY ti.id_item
                ORDER BY votes DESC, ti.name ASC
                LIMIT 10";
        return $this->dbm->query($sql, [], 'assoc');
    }


    // Verifica se un utente ha già votato un item
    public function hasVoted($user_id, $item_id)
    {
        $sql = "SELECT * FROM votes WHERE id_user = ? AND id_item = ?";
        $res = $this->dbm->one($sql, [$user_id, $item_id], 'assoc');
        return !empty($res); // true se ha votato, false se non ha votato
    }

    // Aggiunge un voto (solo se non ha già votato)
    public function addVote($user_id, $item_id)
    {
        if ($this->hasVoted($user_id, $item_id)) {
            return false;
        }
        $sql = "INSERT INTO votes (id_user, id_item, vote_date) VALUES (?, ?, NOW())";
        return $this->dbm->pex($sql, [$user_id, $item_id]);
    }
}
