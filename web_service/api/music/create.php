<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');


include_once '../../config/Database.php';
include_once '../../models/Music.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$music = new music($db);

//Get raw DJ data
$data = json_decode(file_get_contents("php://input"));


$music->id_event  = $data->id_event;
$music->id_song   = $data->id_song;
$music->rating    = 0;

// Create post
if($music->create()){
    echo json_encode(
        array('message' => 'Song Created',)
);
}else{
    echo json_encode(
        array('message' => 'Song Not Created',)
    );
};
