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

//Get raw data
$data = json_decode(file_get_contents("php://input"));
//rank song
$music->id        = $data->id;
$music->rating    = $data->rating;

// Create post
if($music->rank()){
    echo json_encode(
        array('message' => '+1',)
);
}else{
    echo json_encode(
        array('message' => 'Song Not Ranked',)
    );
};
