<?php 
class Database{
    public $pdo;
    private $table="test";

    public function __construct($dbName= "test", $username="root",$pwd= "", $host='localhost:3307'){
        try{
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbName",$username, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"connected to database $dbName";
        }catch(PDOException $e){
            echo "Connection failed: ". $e->getMessage();
        }
    }
    public function INSERT($email,$password   ){
        $stmt = $this ->pdo->prepare("INSERT into $this->table (email,password)VALUES(?,?) ");
        $password =password_hash ( $password,PASSWORD_DEFAULT );
        $stmt->execute([$email,$password]);
    }
    public function select() {
    $stmt = $this -> pdo -> query("Select* from $this->table");
    $result = $stmt -> fetchAll();
    return $result;
}
}
?>























































