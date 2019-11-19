<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');

include_once '../../config/Database.php';
include_once '../../models/Music.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$music = new Music($db);


//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set post id to update
$music->id = $data->id;

// Delete post
if($music->delete()){
    echo json_encode(
        array('message' => 'Song Deleted',)
);
}else{
    echo json_encode(
        array('message' => 'Song Not Deleted',)
    );
};
