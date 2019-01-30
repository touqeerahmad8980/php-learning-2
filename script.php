<?php 
    require_once('config.php');
    $id= $_GET['id'];
    
    try{
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $sql = "DELETE FROM my_database WHERE id=".$id;  
        if($pdo->exec($sql)){
            echo "Records were deleted successfully.";
        }else{
            echo "Error"; 
        }      
        
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
 ?>