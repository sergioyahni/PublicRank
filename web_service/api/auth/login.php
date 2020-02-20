<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');


include_once '../../config/Database.php';
include_once '../../models/Auth.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$login = new Auth($db);

//Get raw DJ data
$data = json_decode(file_get_contents("php://input"));
$email =  $data->email;
$password = sha1($database->saltPrefix . $data->password . $database->saltSufix);
$login->email = $data->email;

//get verification info
$login->verify();

// create verification log array
$log =  array(
    'id'    => $login->id,
    'email' => $login->email,
    'psw'   => $login->pass
);
//var_dump($log);

if ($password == $log['psw']){
    session_start();
    $_SESSION["uid"] = $log['id'];;
/*
    $cookie_name = 'uid';
    $cookie_value = $log['id'];
    setcookie($cookie_name,$cookie_value);
*/
    echo json_encode(array('message' => 'Login Success',));
}
else{
    echo json_encode(array('message' => 'Login Failed',));
}
