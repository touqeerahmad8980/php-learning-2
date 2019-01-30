<?php
 
    require_once('config.php');
    $user_email = $item_name = $item_price = "sdds";
    
    try{
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $user_email = $_POST["userEmail"];
            $item_name = $_POST["itemName"];
            $item_price = $_POST["itemPrice"];
            try{
                // Attempt insert query execution
                $sql = "INSERT INTO my_database (user_email, item_name, item_price) VALUES ('$user_email', '$item_name', '$item_price')";    
                $pdo->exec($sql);

                header("location: index.php");
                exit();
            }catch(PDOException $e){
                echo '<div class="alert alert-danger"><strong>Already Exists!</strong> sorry item "'.$item_name.'" already exists.</div>';
            }
        }
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    $pdo = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h2 class="heading">Create Items</h2>
        </div>
    </div>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label>User Email:</label>
                <input type="text" class="form-control" name="userEmail">
            </div>
            <div class="form-group">
                <label>Item Name:</label>
                <input type="text" class="form-control" name="itemName">
            </div>
            <div class="form-group">
                <label>Item Price:</label>
                <input type="text" class="form-control" name="itemPrice">
            </div>
            <button type="submit" class="btn btn-primary" value="submit">Add Item</button>
            <a href="index.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>