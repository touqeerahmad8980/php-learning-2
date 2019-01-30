<?php
    require_once('config.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h2>Home Page</h2>
        </div>
    </div>   
    <div class="container">
        <a href="create.php" class="btn btn-primary">Create Item</a>
        <table class="table table-striped" style="margin-top:50px;">
            <thead>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>User Email</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
            <?php
                $table = "SELECT * FROM my_database";   
                $result = $pdo->query($table);
                // Attempt select query execution
                try{

                    if($result->rowCount() > 0){
                        while($row = $result->fetch()){?>
                            <tr>
                                <td><?php echo $row['item_name'];?></td>
                                <td> <?php echo $row['item_price'];?></td>
                                <td> <?php echo $row['user_email'];?></td>
                                <input type="hidden" class='delete_id' value='<?php echo $row['id'];?>'>
                                <td><a href="<?php echo "single-view.php?id=". $row['id'] ?>" class="view_item" title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                <a href='javscript:void(0);' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                <a href='javscript:void(0);' class="delete_item" title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                </td>
                            </tr>
                        <?php }
                        // Free result set
                        unset($result);
                    } else{
                        echo "No records matching your query were found.";
                    }
                } catch(PDOException $e){
                    die("ERROR: Could not able to execute $table. " . $e->getMessage());
                }
                
                // Close connection
                unset($pdo);
            ?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        // tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // delete items
        $(".delete_item").click(function(){
            var id = $(this).closest('tr').find('.delete_id').val();
            var item=$(this);
            $.get("script.php?id="+id, function(){
                item.closest('tr').slideUp();
            });
        });
    });
</script>
</html>