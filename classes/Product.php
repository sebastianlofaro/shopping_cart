<?php
class Product
{
  public $id = null;
  public $imagePath = null;
  public $name = null;
  public $description = null;
  public $price = null;

  public function __construct( $data=array() ) {
    if ( isset($data['id']) ) $this->id = (int) $data['id'];
    if ( isset($data['imagePath']) ) $this->imagePath = $data['imagePath'];
    if ( isset($data['name']) ) $this->name = $data['name'];
    if ( isset($data['description']) ) $this->description = $data['description'];
    if ( isset($data['price']) ) $this->price = $data['price'];
  }

  public static function getList() {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT * FROM products";

    $st = $conn->prepare( $sql );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $article = new Product( $row );
      $list[] = $article;
    }

    $conn = null;
    return $list;
  }

  public static function getProductByID( $id ) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT * FROM products WHERE id = :id";

    $st = $conn->prepare( $sql );
    $st->bindValue(":id", $id, PDO::PARAM_INT);
    $st->execute();

    $row = $st->fetch();
    $conn = null;
    if ($row) return new Product ($row);
  }






}

 ?>
