
<?php
session_start();
require("helper.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = clean($_POST["name"]);
  $email = clean($_POST["email"]);
  $gender = clean($_POST["gender"]);
  $address = clean($_POST["address"]);
  $linkedin = clean($_POST["linkedin"]);
  $password = ($_POST["password"]);
  //file variables
  $imgtmp_path = $_FILES['profile']['tmp_name'];
  $imgname     = $_FILES['profile']['name'];
  $imgsize     = $_FILES['profile']['size'];
  $imgtype     = $_FILES['profile']['type'];

  $errors = [];

  if(!validate($name,1)){
    $errors['name'] = "Field Required";
  
   }elseif(!validate($name,2)){
    $errors['name'] = "Invalid String";
   }

  if(!validate($email,1)){
   $errors['Email'] = "Field Required";
 
  }elseif(!validate($email,3)){
   $errors['Email'] = "Invalid Email";
  }

  if(!validate($address,1)){
    $errors['Address'] = "Field Required";
  
   }elseif(!validate($address,6)){
    $errors['Address'] = "Invalid address must be less than 10 char";
   }

   if(!validate($password,1)){
    $errors['Password'] = "Field Required";
  
   }elseif(!validate($password,5)){
    $errors['Password'] = "Invalid password must be more than 6 char";
   }

   if(!validate($linkedin,1)){
    $errors['linkedin'] = "Field Required";
  
   }elseif(!validate($linkedin,7)){
    $errors['Linkedin'] = "Invalid linkedin url";
   }

   if(!validate($gender,1)){
    $errors['Gender'] = "Field Required";
  
   }elseif(!validate($gender,8)){
    $errors['Gender'] = "Invalid gender";
   }

  if(!validate($imgname,1)){
   $errors['profile'] = "Field Required";
 
  }elseif(!validate($imgtype,4)){
   $errors['profile'] = "Invalid Extension";
  }

  if(count($errors) > 0){

    foreach($errors as $key => $value){
        echo '* '.$key.' : '.$value.'<br>';
    }
    
    
    }else{
      


        $extArray = explode('/',$imgtype);
        $finalName =   rand().time().'.'.$extArray[1];


        $desPath = './uploads/'.$finalName;
        
        if(move_uploaded_file($imgtmp_path,$desPath)){

          $_SESSION['student'] = ['name' => $name , 'email' => $email , 'profile' => $finalName, 'address' => $address, 'linkedin' => $linkedin];

        }else{
            echo 'Error In Uploading Try Again';
        }
  }
}

?>

















<?php 
require("base.php");
?>
<body>

<div class="container">
  <h2>Register</h2>
  <form method="post" action= "<?php echo $_SERVER["PHP_SERVER"];?>"  enctype ="multipart/form-data">

  

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
 
  <div class="form-group">
    <label for="exampleInputPassword1">Uplode Profile</label>
    <input type="file" name="profile" class="form-control">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

