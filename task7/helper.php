<?php





function clean($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = strip_tags($var);

    return $var;
}


function checkempty($inputs){
    $success = 0;
    for ($i=0; $i < count($inputs); $i++) { 
        foreach ($inputs[$i] as $key => $value) {
            if(empty($value)){
                echo "please insert valid data $key field must be required <br>";
            } else{
                $success++;
            }
        }
    }
    if($success == count($inputs)){
        
        echo "Data saved success";
        return true;
    }
}

function validPattern($input, $flag){
    switch ($flag) {
        case 'string':
            $pattern = '/^[a-zA-Z\s]*$/';
            return preg_match($pattern, $input);
            break;

        case 'time':
            $pattern = "/[0-9]{9,11}/";
            $time = preg_match($pattern, $input);
            $time = filter_var($time, FILTER_VALIDATE_INT);
            
            return $time;
            break;

        
        case 'int':
            $input = filter_var($input, FILTER_VALIDATE_INT);
            
            return $input;
            break;
    
            
    }
}

?>