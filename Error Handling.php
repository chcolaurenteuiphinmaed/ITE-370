<?php

function divideNumbers($num1,$num2){

    if($num2 == 0){
        throw new Exception("Division by zero is not allowed.");
    }

    return $num1 / $num2;
}

try{

$result = divideNumbers(10,0);

echo "Result: ".$result;

}
catch(Exception $e){

$errorMessage = $e->getMessage();

file_put_contents("error_log.txt",$errorMessage."\n",FILE_APPEND);

echo "An error occurred. Please check the log file.";

}

finally{

echo "<br>Program executed.";

}

?>
