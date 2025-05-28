<?php
defined('APP') or die("Accesso negato");
/*--------------------------------------------------
 - $pdo
----------------------------------------------------
 + __construct()
 + query($dql, $params = [], $type = PDO::FETCH_OBJ)
 + one($dql, $params = [], $type = PDO::FETCH_OBJ)
 + pex($dml, $params = []) 
--------------------------------------------------*/
const HOST = "sql100.infinityfree.com";
const DBNAME = "if0_38947338_topdieci";
const USERNAME = "if0_38947338";
const PASSWORD = "zaccaria190107";

class DBManager
{
  private $pdo;
  public function __construct()
  {
    try {

      $dsn = "mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8mb4";
      $this->pdo = new PDO($dsn, USERNAME, PASSWORD);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Errore di connessione al database.");
    }
  }

  // Effettua una query dql (SELECT) parametrica anonima (?) 
  // Se non ci sono eccezioni restituisce una matrice 
  // altrimenti blocca il programma e segnala un messaggio d'errore
  public function query($dql, $params = [], $type = PDO::FETCH_OBJ)
  {
    if ($type == 'array') $type = PDO::FETCH_NUM;        //Array indicizzato
    elseif ($type == 'assoc') $type = PDO::FETCH_ASSOC;  //Array associativo
    else $type = PDO::FETCH_OBJ;                         //Oggetto
    try {
      $stm = $this->pdo->prepare($dql);
      $stm->execute($params);
      return $stm->fetchAll($type);
    } catch (PDOException $e) {
      die("Errore nel recupero dei dati da query.");
    }
  }
  
  // Effettua una query dql (SELECT) parametrica anonima (?) 
  // Se non ci sono eccezioni restituisce un array 
  // altrimenti blocca il programma e segnala un messaggio d'errore
  public function one($dql, $params = [], $type = PDO::FETCH_OBJ)
  {
    if ($type == 'array') $type = PDO::FETCH_NUM;        //Array indicizzato
    elseif ($type == 'assoc') $type = PDO::FETCH_ASSOC;  //Array associativo
    else $type = PDO::FETCH_OBJ;                         //Oggetto
    try {
      $stm = $this->pdo->prepare($dql);
      $stm->execute($params);
      return $stm->fetch($type);
    } catch (PDOException $e) {
      echo $e;
      die("Errore nel recupero dei dati da one.");
    }
  }

  // Effettua una manipolazione dml (INSERT, UPDATE, DELETE) parametrica anonima (?)
  // Se non ci sono eccezioni restituisce true 
  // altrimenti blocca il programma e segnala un messaggio d'errore
  public function pex($dml, $params = [])
  {
    try {
      $stm = $this->pdo->prepare($dml);
      $result = $stm->execute($params);
      return $result; 
    } catch (PDOException $e) {
      die("Errore nella modifica dei dati da pex.");
    }    
  }  

}
