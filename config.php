<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'users');
$pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{

    if (!$pdo->query ("DESCRIBE my_database")){
        //create table
        $sql = "CREATE TABLE my_database(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            user_email VARCHAR(70) NOT NULL UNIQUE,
            item_name VARCHAR(70) NOT NULL,
            item_price VARCHAR(70) NOT NULL
        )";    
        $pdo->exec($sql);
        echo "Table created successfully.";
    }

}catch(PDOException $e){

    //recived table create error
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());

}

?>