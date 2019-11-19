<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');

include_once '../../config/Database.php';
include_once '../../models/DJ.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$dj = new DJ($db);


//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set post id to update
$dj->id = $data->id;

// Delete post
if($dj->delete()){
    echo json_encode(
        array('message' => 'DJ Deleted',)
);
}else{
    echo json_encode(
        array('message' => 'DJ Not Deleted',)
    );
};
