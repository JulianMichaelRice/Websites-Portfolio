<?php 
require "../config_parse.php";

if(!$auth) {
    echo 'not authorized to access page';
    exit;
}

$data = json_decode(file_get_contents('php://input'));

exec('../virtualenv/hunting/3.7/bin/python ../parse.py' . ' -u ' . $data->userid . ' -t ' . $data->eventtype . ' -i ' . $data->eventid . ' -d ' . $data->data , $result);
print_r($result);
?> 
