<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');

if (!isset($_SESSION)) { die(json_encode(array('message' => 'ID Error',); }

include_once '../../config/Database.php';
include_once '../../models/Song.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$song = new Song($db);


//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set post id to update
$song->id = $data->id;

// Delete post
if($song->delete()){
    echo json_encode(
        array('message' => 'Song Deleted',)
);
}else{
    echo json_encode(
        array('message' => 'Song Not Deleted',)
    );
};
