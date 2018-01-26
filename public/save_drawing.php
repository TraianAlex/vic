<?php

//die(var_dump($_POST));
$result = $_POST ?? null;
//die(var_dump(array_values($result)));
//$parse = array_values($result);
////die(var_dump($parse[0]));
$json = json_encode($result);
if(preg_match('/^\[\"(rgb)\(/', $json)){
    file_put_contents("storage/image.x", $json);
    header('Location /draw');
}else{
    header('Location /');
}

