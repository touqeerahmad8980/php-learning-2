<!DOCTYPE html>
<?php
        require_once('config.php');

        $id= $_GET['id'];

        $result = $pdo->query("select * from my_database where id='$id' order  by  id");
        $row = $result->fetch();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item name</title>
</head>
<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</body>
    <div class="jumbotron">
        <div class="container">
            <h2> <?php echo $row['user_email']; ?></h2>
        </div>
    </div>
    <div class="container">
    <?php
        echo 'Item id: '.$row['id'].'</br>';
        echo 'User Email: '.$row['user_email'].'</br>';
        echo 'Item Name: '.$row['item_name'].'</br>';
        echo 'Item Price: '.$row['item_price'].'</br>';

        unset($pdo);
        ?>
    </div>
</html>