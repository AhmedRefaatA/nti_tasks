<?php





require "db_connect.php";

$sql = "select * from todos";
$op = mysqli_query($connect, $sql);





?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>TODO APP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <table class="table table-hover">
                <thead>
                
                <tr>
                <th>#</th>
                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $i = 0;
                while ($data = mysqli_fetch_assoc($op)) {
            ?>
                <tr>
                <td><?php echo ++$i;?></td>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['title'];?></td>
                <td><?php echo $data['description'];?></td>
                <td><?php echo date("m/d/Y H:i", $data['start_date']);?></td>
                <td><?php echo date("m/d/Y H:i", $data['end_date']);?></td>
                <td>
                    <a href="" class="btn btn-danger">Delete</a >
                    <a href="" class="btn btn-primary">Edite</a >
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>