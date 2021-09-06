
<?php

// first function for return next letter ...

function getNextAlpha($letter){
    $alphas = range("a", "z");
    $nextLetter = $alphas[(array_search($letter, $alphas)) + 1];
    if($letter == "z"){
        $nextLetter = "a";
    }
    return "The next letter after " . $letter . " is " . $nextLetter . "\n";
     
}
echo getNextAlpha("z");


// second function for return file name from string ... 

function getFileName($str){
    $arr_split = explode("/", $str);
    $fileName = $arr_split[count($arr_split) - 1];
    return $fileName;

     
}
echo "<br>";
echo getFileName("www.example.com/public_html/index.php");
?>