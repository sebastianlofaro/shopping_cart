<?php
//session_start();
/**
 *
 */
class CartItem
{
  private $id = null;
  private $name = null;
  private $description = null;
  private $imagePath = null;
  private $price = null;

  function __construct($data=array())
  {
    if (isset($data['id'])) $this->id = $data['id'];
    if (isset($data['name'])) $this->name = $data['name'];
    if (isset($data['description'])) $this->description = $data['description'];
    if (isset($data['imagePath'])) $this->imagePath = $data['imagePath'];
    if (isset($data['price'])) $this->price = $data['price'];
  }

  public function storeValues ($params) {
    // Stroe all the parameters
    $this ->__construct($params);
  }

  public static function getByID($id) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT * FROM products WHERE id = :id";
    $st = $conn->prepare($sql);
    $st->bindValue(":id", $id, PDO::PARAM_INT);
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ($row) return new CartItem($row);
  }


}

 ?>
