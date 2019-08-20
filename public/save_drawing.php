<?php

//die(var_dump($_POST));
$result = $_POST ?? null;
//die(var_dump(array_values($result)));
//$parse = array_values($result);
////die(var_dump($parse[0]));
$json = json_encode($result);
if(preg_match('/^\[(\"(rgba?)\(\d{1,3}\,\s\d{1,3}\,\s\d{1,3}\,?\s?\d?\)\").*(\,?).*\]$/', $json)){
    file_put_contents("storage/image.x", $json);
    header('Location /draw');
}else{
    header('Location /');
}

//re1 = '/^\[\"(rgb)\(/';
//$re2 = '/^\[(\"(rgba?)\(\d{1,3}\,\s\d{1,3}\,\s\d{1,3}\,\s\d?\W\"\,)(...................)+/';
//$re3 = '/^\[(\"(rgba?)\(\d{1,3}\,\s\d{1,3}\,\s\d{1,3}\,?\s?\d?\)\").*(\,?).*\]$/';
