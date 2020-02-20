<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');


include_once '../../config/Database.php';
include_once '../../models/DJ.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$dj = new DJ($db);

//Get raw DJ data
$data = json_decode(file_get_contents("php://input"));
$password  = sha1($database->saltPrefix . $data->password . $database->saltSufix);
$img       = $data->image;

$dj->first_name = $data->first_name;
$dj->last_name  = $data->last_name;
$dj->email      = $data->email;
$dj->pass       = $password;
$dj->phone      = $data->phone;
$dj->website    = $data->website;
$dj->facebook   = $data->facebook;
$dj->about      = $data->about;
$dj->location   = $data->location;
$dj->image      = $img;

// Create post
if($dj->create()){
    echo json_encode(
        array('message' => 'Post Created',)
);
}else{
    echo json_encode(
        array('message' => 'Post Not Created',)
    );
};
