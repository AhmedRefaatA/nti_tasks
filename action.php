<?php

// clean function 
function clean($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = strip_tags($var);

    return $var;
}

// variables
$name = ["name" => filter_var(clean($_POST["name"]), FILTER_SANITIZE_STRING)];
$email = ["email" => filter_var(clean($_POST["email"]), FILTER_VALIDATE_EMAIL)];
$gender = ["gender" => filter_var(clean($_POST["gender"]), FILTER_SANITIZE_STRING)];
$address = ["address" => filter_var(clean($_POST["address"]), FILTER_SANITIZE_STRING)];
$linkedin = ["linkedin" => filter_var(clean($_POST["linkedin"]), FILTER_VALIDATE_URL)];

// password validations
if(strlen($_POST["password"]) < 6){
    $password = ["password" => ""];
} else {
    $password = ["password" => $_POST["password"]];
}
// function for check empty inputs ...
function checkempty($inputs){
    $success = 0;
    for ($i=0; $i < count($inputs); $i++) { 
        foreach ($inputs[$i] as $key => $value) {
            if(empty($value)){
                echo "please insert valid data $key field must be required ";
            } else{
                $success++;
            }
        }
    }
    if($success == count($inputs)){
        echo "Data saved success";
    }
}


// resulte request post 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    checkempty([$name, $email, $gender, $password, $address, $linkedin]);

    // email length validation
    if(strlen($address["address"]) > 10){
        echo "max length of address must be 10 character";
    }
}


     


?>