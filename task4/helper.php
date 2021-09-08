<?php












// clean function to clean inputs ... 
function clean($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = strip_tags($input);

    return $input;
}
/*
function checkempty($input){
    if(!empty($input)){
        return true;
    } else{
        echo "please insert " . $input . " field it must be required";
    }
}*/

function validate($input,$flag){
    $status = true;
    
        switch ($flag) {
        case 1:
                # code...
                if(empty($input)){
                $status = false;
                }
                break;
    
        case 2: 
            if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
                $status = false;
            }
            break;
    
        case 3: 
            if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status = false;
            } 
            break; 
    
        case 4: 
            $allowedExt = ['png','jpeg', 'jpg'];
    
            $extArray = explode('/',$input);
        
            if(!in_array($extArray[1],$allowedExt)){
                $status = false;
            }
    
            break;


        case 5: 
            if(strlen($input) < 6){
                $status = 0;
            break;
        }

        case 6: 
            if(strlen($input) > 10){
                $status = 0;
            break;
        }

        case 7: 
            if(!filter_var($input,FILTER_VALIDATE_URL)){
                $status = false;
            } 
            break; 
        
        case 8: 
            if(!in_array($input, ["male", "female"])){
                $status = false;
            } 
            break; 
            
        return $status;
    
    }
}

?>