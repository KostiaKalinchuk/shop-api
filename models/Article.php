<?php

/**
 * Class to handle articles
 */

class Article
{
  /**
  * @var int The article ID from the database
  */
  public $id = null;

  /**
  * @var int The article category ID
  */
  public $categoryId = null;

    // Properties

  public $name = null;
  public $description = null;
  public $price = null;
  public $cpu = null;
  public $camera = null;
  public $size = null;
  public $weight = null;
  public $display = null;
  public $battery = null;
  public $memory = null;
  public $color = null;
  public $system = null;
  public $connection = null;
  public $material = null;
  public $navigation = null;
  public $audio = null;
  public $video = null;

  public $image = null;

  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['categoryId'] ) ) $this->categoryId = (int) $data['categoryId'];
    if ( isset( $data['name'] ) ) $this->name = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-Яіїa-zA-Z0-9()]/u", "", $data['name'] );
    if ( isset( $data['description'] ) ) $this->description = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-ЯёЁіїa-zA-Z0-9()]/u", "", $data['description'] );
    if ( isset( $data['price'] ) ) $this->price = $data['price'];
    if ( isset( $data['cpu'] ) ) $this->cpu = $data['cpu'];
    if ( isset( $data['camera'] ) ) $this->camera = $data['camera'];
    if ( isset( $data['size'] ) ) $this->size = $data['size'];
    if ( isset( $data['weight'] ) ) $this->weight = $data['weight'];
    if ( isset( $data['display'] ) ) $this->display = $data['display'];
    if ( isset( $data['battery'] ) ) $this->battery = $data['battery'];
    if ( isset( $data['memory'] ) ) $this->memory = $data['memory'];
    if ( isset( $data['color'] ) ) $this->color = $data['color'];
    if ( isset( $data['system'] ) ) $this->system = $data['system'];
    if ( isset( $data['connection'] ) ) $this->connection = $data['connection'];
    if ( isset( $data['material'] ) ) $this->material = $data['material'];
    if ( isset( $data['navigation'] ) ) $this->navigation = $data['navigation'];
    if ( isset( $data['audio'] ) ) $this->audio = $data['audio'];
    if ( isset( $data['video'] ) ) $this->video = $data['video'];

    if ( isset( $data['image'] ) ) $this->image = $data['image'];
  }


  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues ( $params ) {

    $this->__construct( $params );
  }


  /**
  * Returns an Article object matching the given article ID
  *
  * @param int The article ID
  * @return Article|false The article object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM Phones WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Article( $row );
  }


  /**
  * Returns all (or a range of) Article objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @param int Optional Return just articles in the category with this ID
  * @param string Optional column by which to order the articles (default="publicationDate DESC")
  * @return Array|false A two-element array : results => array, a list of Article objects; totalRows => Total number of articles
  */

    public static function getList( $numRows=1000000) {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Phones " . " LIMIT :numRows";

        $st = $conn->prepare( $sql );
        $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
        $st->execute();
        $list = array();

        while ( $row = $st->fetch() ) {
            $article = new Article( $row );
            $list[] = $article;
        }

        // Получаем общее количество статей, которые соответствуют критерию
        $sql = "SELECT FOUND_ROWS() AS totalRows";
        $totalRows = $conn->query( $sql )->fetch();
        $conn = null;
        return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
    }


  /**
  * Inserts the current Article object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the Article object already have an ID?
//    if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );



      $full = 'http://shop-api.local/';
      $path = 'images/'; // директория для загрузки
      $ext = array_pop(explode('.',$_FILES['image']['name'])); // расширение
      $new_name = time().'.'.$ext; // новое имя с расширением
      $full_path = $path.$new_name; // полный путь с новым именем и расширением

      if($_FILES['image']['error'] == 0){
          if(move_uploaded_file($_FILES['image']['tmp_name'], $full_path)){


    // Insert the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO 
            Phones ( categoryId, name, description, price, cpu, camera, size, weight, 
            display, battery, memory, color, system, connection, material, navigation, audio, video, image ) 
            VALUES (:categoryId, :name, :description, :price, :cpu, :camera, :size, :weight, 
            :display, :battery, :memory, :color, :system, :connection, :material, :navigation, :audio, :video, :image )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":categoryId", $this->categoryId, PDO::PARAM_INT );
    $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
    $st->bindValue( ":description", $this->description, PDO::PARAM_STR );
    $st->bindValue( ":price", $this->price, PDO::PARAM_INT );
    $st->bindValue( ":cpu", $this->cpu, PDO::PARAM_STR );
    $st->bindValue( ":camera", $this->camera, PDO::PARAM_STR );
    $st->bindValue( ":size", $this->size, PDO::PARAM_STR );
    $st->bindValue( ":weight", $this->weight, PDO::PARAM_STR );
    $st->bindValue( ":display", $this->display, PDO::PARAM_STR );
    $st->bindValue( ":battery", $this->battery, PDO::PARAM_STR );
    $st->bindValue( ":memory", $this->memory, PDO::PARAM_STR );
    $st->bindValue( ":color", $this->color, PDO::PARAM_STR );
    $st->bindValue( ":system", $this->system, PDO::PARAM_STR );
    $st->bindValue( ":connection", $this->connection, PDO::PARAM_STR );
    $st->bindValue( ":material", $this->material, PDO::PARAM_STR );
    $st->bindValue( ":navigation", $this->navigation, PDO::PARAM_STR );
    $st->bindValue( ":audio", $this->audio, PDO::PARAM_STR );
    $st->bindValue( ":video", $this->video, PDO::PARAM_STR );

    $st->bindValue( ":image", $full.$full_path, PDO::PARAM_STR );

    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;


          }
      }

  }


  /**
  * Updates the current Article object in the database.
  */

  public function update() {

    // Does the Article object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );

    // Update the Article  НЕПРАЦЮЄ!!!!!!!!
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE Phones 
            SET categoryId=:categoryId, name=:name, description=:description, price=:price, cpu=:cpu, camera=:camera, 
            size=:size, weight=:weight, display=:display, battery=:battery, memory=:memory, color=:color, system=:system, 
            connection=:connection, material=:material, navigation=:navigation, audio=:audio, video=:video  
            WHERE id = :id";
    $st = $conn->prepare ( $sql );

    $st->bindValue( ":categoryId", $this->categoryId, PDO::PARAM_INT );
    $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
    $st->bindValue( ":description", $this->description, PDO::PARAM_STR );
    $st->bindValue( ":price", $this->price, PDO::PARAM_INT );


    $st->bindValue( ":cpu", $this->cpu, PDO::PARAM_STR );
    $st->bindValue( ":camera", $this->camera, PDO::PARAM_STR );
    $st->bindValue( ":size", $this->size, PDO::PARAM_STR );
    $st->bindValue( ":weight", $this->weight, PDO::PARAM_STR );
    $st->bindValue( ":display", $this->display, PDO::PARAM_STR );
    $st->bindValue( ":battery", $this->battery, PDO::PARAM_STR );
    $st->bindValue( ":memory", $this->memory, PDO::PARAM_STR );
    $st->bindValue( ":color", $this->color, PDO::PARAM_STR );
    $st->bindValue( ":system", $this->system, PDO::PARAM_STR );
    $st->bindValue( ":connection", $this->connection, PDO::PARAM_STR );
    $st->bindValue( ":material", $this->material, PDO::PARAM_STR );
    $st->bindValue( ":navigation", $this->navigation, PDO::PARAM_STR );
    $st->bindValue( ":audio", $this->audio, PDO::PARAM_STR );
    $st->bindValue( ":video", $this->video, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );

    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current Article object from the database.
  */

  public function delete() {

    // Does the Article object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Article::delete(): Attempt to delete an Article object that does not have its ID property set.", E_USER_ERROR );

    // Delete the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM Phones WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}


