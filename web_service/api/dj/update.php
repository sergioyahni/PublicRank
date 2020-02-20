<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');


include_once '../../config/Database.php';
include_once '../../models/DJ.php';

//Verify idea
session_start();
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : die(json_encode(array('message' => 'ID Error',)));

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$dj = new DJ($db);

//Get raw DJ data
$data = json_decode(file_get_contents("php://input"));
$password  = sha1($database->saltPrefix . $data->password . $database->saltSufix);
//set id to update
$dj->id    = $uid;

//set variable for updating
$dj->first_name = $data->first_name;
$dj->last_name  = $data->last_name;
$dj->email      = $data->email;
$dj->pass       = $password;
$dj->phone      = $data->phone;
$dj->website    = $data->website;
$dj->facebook   = $data->facebook;
$dj->about      = $data->about;
$dj->location   = $data->location;
$dj->image      = $data->image;

// Create post
if($dj->update()){
    echo json_encode(
        array('message' => 'Post Updated',)
);
}else{
    echo json_encode(
        array('message' => 'Post Not Updated',)
    );
};
