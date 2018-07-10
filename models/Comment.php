<?php


class Comment
{
  // Properties

  /**
  * @var int The category ID from the database
  */
  public $id = null;

  /**
  * @var string Name of the category
  */
  public $name = null;
  public $email = null;
  public $message = null;

  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['name'] ) ) $this->name = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-Яіїa-zA-Z0-9()]/u", "", $data['name'] );
    if ( isset( $data['email'] ) ) $this->email = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-Яіїa-zA-Z0-9()]/u", "", $data['email'] );
    if ( isset( $data['message'] ) ) $this->message = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-Яіїa-zA-Z0-9()]/u", "", $data['message'] );
  }


  public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params );
  }

  /**
  * @return Comment|false, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM Feedback WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Comment( $row );
  }

  public static function getList( $numRows=1000000 ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Feedback " . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $comment = new Comment( $row );
      $list[] = $comment;
    }

    // Now get the total number of categories that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }

}


