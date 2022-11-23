<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= b, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css" integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
    <title>Todos</title>
</head>
<body>
    <?php require_once 'connection.php'; ?>

    <div class="container">
    <div class="row justify-content-center">
    <form action="connection.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>"
    <div class="form-group">
    <label>Todo..</label>
    <input type="text" name="tdo" class="form-control" value ="<?php echo $tdo ?>" placeholder="what to do.."/>    
</div>
<?php if($update==true): ?>
    <button type="submit" class="btn btn-info" name="update">Update</button>    
<?php else: ?>
<button type="submit" class="btn btn-primary" name="save">Save</button>
<?php endif ?>
</form>
</div>
<?php
    $mysql = new mysqli("localhost","root","","testdb") or die(mysqli_error($mysql));
    $result=$mysql->query("SELECT * FROM data") or die($mysql->errror);
    //pre_r($result->fetch_assoc());
    ?>

<div class="row justify-content-center">
<table class="table">
<thead>
<tr>
<th>Todo</th>
<th colspan="2"></th>>
</tr>
</thead>
<?php 
while($row=$result->fetch_assoc()):
?>
<tr>
<td><?php echo $row['todo']; ?></td>
<td><a href="index.php?edit=<?php echo $row['id']; ?>"
class="btn btn-info">Edit</a>
<a href="connection.php?delete=<?php echo  $row['id']; ?>"
class="btn btn-danger">Delete</a>

</td>
</tr>
<td>
<?php endwhile ?>
</table> 
</div> 
</div>
<?php

    //function pre_r($array){
        //echo "<pre>";
        //print_r($array);
       // echo "</pre>";
 ?>

</body>
</html>