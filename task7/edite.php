<?php





require "db_connect.php";
require "helper.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = validPattern(clean($_GET["id"]), 'int');
    $sql = "SELECT * FROM todos WHERE id = $id";
    $op = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($op);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = ["title" => filter_var(clean($_POST["title"]), FILTER_SANITIZE_STRING)];
    $description = ["description" => filter_var(clean($_POST["description"]), FILTER_SANITIZE_STRING)];
    $start_date = ["start_date" => clean($_POST["start_date"])];
    $end_date = ["end_date" => clean($_POST["end_date"])];
    $checkempty = checkempty([$title, $description, $start_date, $end_date]);
  
    $start_date = new DateTime($start_date["start_date"]);
    $end_date = new DateTime($end_date["end_date"]);
    
    $start_date = $start_date -> getTimestamp();
    $end_date = $end_date -> getTimestamp();
    
    $validTitle = validPattern($title["title"], "string");
    $validStartDate = validPattern($start_date, "time");
    $validEndDate = validPattern($start_date, "time");
   
    if($checkempty && $validTitle && $validStartDate && $validEndDate){
      $id = $_POST['id'];
      //echo $id;
      $title = $title["title"];
      $description = $description["description"];
      $sql = "UPDATE todos SET title='$title',description='$description',start_date='$start_date',end_date='$end_date' WHERE id = $id";
      $op = mysqli_query($connect,$sql);
      //echo $sql;
      header("Location: index.php");
    }
   
  
  
  
  }


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
<div class="container">
  <h2>Edite TODO</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"  enctype ="multipart/form-data">

  
  <input type="hidden" name='id' value="<?php echo $data['id']; ?>">
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="title"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title" value="<?php echo $data['title']?>">
  </div>


  <div class="form-group">
    <label for="staticEmail"> Desciption</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $data['description']?></textarea>
  </div>

  <div class="form-group col-md-6">
    <label for="exampleInputPassword">Start date</label>
    <input type="datetime-local" name="start_date"   class="form-control" id="exampleInputPassword" value="<?php echo str_replace('EEST', 'T', date('Y-m-dTH:i', $data['start_date']));?>">
  </div>

  <div class="form-group col-md-6">
    <label for="exampleInputPassword">End date</label>
    <input type="datetime-local" name="end_date"   class="form-control" id="exampleInputPassword" value="<?php echo str_replace('EEST', 'T', date('Y-m-dTH:i', $data['end_date']));?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
