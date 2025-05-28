<?php
defined('APP') or die("Accesso negato");
/*--------------------------------------------------
  # $title;
  # $table;
  # $keys;
  # $classtyle;
----------------------------------------------------
  + __construct($table)
  + setTitle($title)
  + setStyle($classtyle)
  + setKeys($keys = [])
  + render() 
--------------------------------------------------*/
class prinTable {
  protected $title;
  protected $table;
  protected $keys;
  protected $classtyle;

  public function __construct($table){
    $this->table = $table;
    $this->classtyle = "table table-bordered table-striped";
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function setStyle($classtyle){
    $this->classtyle = $classtyle;
  }

  public function setKeys($keys = []){
    if (empty($keys)) {
      $keys = array_keys($this->table[0]);
    } else {
      $this->keys = $keys;
    }
  }  
  
  public function render()
  {
    //Calcolo della larghezza delle colonne 
    $col_size = number_format(100/count($this->keys));
    //Preparazione del titolo e dello stile 
    // echo "<table class=' caption-top'>";
    $tab = "<table class='caption-top {$this->classtyle}'>".
           "<caption class='text-center h2'>$this->title</caption>".
           "<thead><tr>";
    //Preparazione della riga di intestazione
    foreach ($this->keys as $key) 
      $tab .= "<th style ='width: {$col_size}%; text-align: center;'>$key</th>";
    $tab .= "</tr></thead><tbody style ='text-align: center;'>";
    //Preparazione dei record 
    foreach ($this->table as $row) {
      $tab .= "<tr style ='text-align: center;'>";
      foreach ($row as $field) 
        $tab .= "<td style ='text-align: center;'>{$field}</td>";
      $tab .= "</tr>";
    }
    $tab .= "</tbody></table>";
    return $tab;
  }

  public function auctionInfo(){
    //Calcolo della larghezza delle colonne 
    $col_size = number_format(100/count($this->keys));
    //Preparazione del titolo e dello stile 
    // echo "<table class=' caption-top'>";
    $tab = "<table class='caption-top {$this->classtyle}'>".
           "<caption class='text-center h2'>$this->title</caption>".
           "<thead><tr>";
    //Preparazione della riga di intestazione
    foreach ($this->keys as $key){
      $tab .= "<th style ='width: {$col_size}%; text-align: center;'>$key</th>";}
    $tab .= "</tr></thead><tbody>";
    //Preparazione dei record 
    foreach ($this->table as $row){
      $id = array_shift($row);
      // $tab .= `<tr href="?option=auction&task=display&id=$id}">`;
      // onclick="window.location=\"?option=auction&task=display&id=$id\""
      $tab .= "<tr>";
      foreach ($row as $field)
        $tab .= "<td>{$field}</td>";
      $tab .= "<td>
                <a href=\"?option=auction&task=display&id=$id\">
                  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\"><path d=\"M10 20A10 10 0 1 0 0 10a10 10 0 0 0 10 10zM8.711 4.3l5.7 5.766L8.7 15.711l-1.4-1.422 4.289-4.242-4.3-4.347z\"/>
                  </svg>
                </a>
              </td>";
      $tab .= "</tr>";
    }
    $tab .= "</tbody></table>";
    return $tab;
  }

  public function card(){
    $tab = "";
    $price = 0;
    foreach($this->table as $row){
      if($row["offer"] == NULL){
        $price = "No offer yet";
      } else {
        $price = $row["offer"].'€';
      }
      if($row['status'] == "closed"){
        $end_date = "<strong>Asta chiusa</strong>";
      } else {
        $end_date = "End date: <strong>{$row['end date']}</strong>";
      }
      $tab .=" <!-- CARD -->
              <!--  categories -->
              <div class=\"col mt-4 carte\">
                <div class=\"card h-70 border-0 shadow\">
                  <!-- IMAGE -->
                  <div class=\"d-flex justify-content-center align-items-center\">
                    <img src=\"./{$row["path img"]}\" style=\"max-height: 24vh; min-height: 24vh; object-fit: cover;\" class=\"card-img-top img-fluid\" alt=\"{$row["title"]}\">
                  </div>
                  <div class=\"card-body bg-light\">
                    <!-- TITLE -->
                    <h5 class=\"card-title\">{$row["title"]}</h5
                    <!-- PRICE -->
                    <p class=\"card-base-price\">{$row["price base"]}€ - <strong class=\"card-price\">{$price}</strong></p>
                    <!-- END DATE -->
                    <p class=\"card-date\">{$end_date}</p>
                    <!--CATEGORY-->
                    <p class=\"card-category\">{$row['category']}</p>
                    <!-- LINK: view row -->
                    <form method=\"POST\" action=\"?option=auction&task=display\">
                      <button type=\"submit\" class=\"btn btn-primary col-12 \" value=\"{$row["id auction"]}\" name=\"id\">View</button>
                    </form>
                    
                  </div>
                </div>
              </div>";
      }
      return $tab;
  }

  public function page(){
    $tab = "";
    foreach($this->table as $row){
      if($row['offer'] == NULL) $row['offer'] = "Not yet";
      else $row['offer'] = $row['offer']."€";
      if(isset($_SESSION['userdata'])){
        if($row['seller'] == $_SESSION['userdata']['name']." ".$_SESSION['userdata']['surname']) $row['seller'] = "You";
      }
      $tab .= "   <!-- Product Information -->
                    <h2 class=\"fw-bold text-dark mb-3\">{$row["title"]}</h2>
                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                      <p class=\"fs-4 text-success fw-bold\">Last Offer: {$row["offer"]}</p>
                      <p class=\"fs-5 text fw-semibold\">Starter Price: {$row["price base"]}€</p>
                    </div>
                    <p class=\"text-muted mb-4\">{$row["description"]}</p>
                    <p class=\"pb-4 text-end\">Sold by {$row['seller']}</p>";
    }
    return $tab;
  }

  public function img(){
    $tab = "";
    foreach($this->table as $row){
      $tab .= " <!-- Product Photo -->
                <div class='col-md-6 d-flex justify-content-center align-items-center'>
                  <img src=\"./{$row["img"]}\" alt=\"{$row["title"]}\" class=\"img-fluid rounded shadow-lg\">
                </div>";
    }
    return $tab;
  }
}