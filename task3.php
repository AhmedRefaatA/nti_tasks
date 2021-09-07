
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form method="post" action="action.php"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name" required>
  </div>


  <div class="form-group">
    <label for="staticEmail">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword" placeholder="Password" required minlength="6">
  </div>

  <div class="form-group">
    <label for="exampleInputGender">Gender</label><br>
    <input type="radio" name="gender" value="male" required>
    male
    <input type="radio" name="gender" value="female" required>
    female
  </div>

  <div class="form-group">
    <label for="exampleInputAddress">address</label>
    <input type="text" name="address"   class="form-control" id="exampleInputAddress" placeholder="Address" required maxlength="10">
  </div>

  <div class="form-group">
    <label for="exampleInputAddress">Linkedin</label>
    <input type="url" name="linkedin"  class="form-control" id="exampleInputLinkedin" placeholder="Linkedin" required>
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

