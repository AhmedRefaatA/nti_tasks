<?php





require "db_connect.php";
require "helper.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = validPattern(clean($_GET["id"]), 'int');

    $sql = "DELETE FROM todos WHERE id = $id";
    $op = mysqli_query($connect, $sql);
    header("Location: index.php");

}

?>