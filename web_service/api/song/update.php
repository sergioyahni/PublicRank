<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');

if (!isset($_SESSION)) { die(json_encode(array('message' => 'ID Error',); }

include_once '../../config/Database.php';
include_once '../../models/Song.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$song = new Song($db);

//Get raw DJ data
$data = json_decode(file_get_contents("php://input"));

$song->id      = $data->id;
$song->id_dj   = $data->id_dj;
$song->name    = $data->name;
$song->genere  = $data->genere;
$song->url     = $data->url;
$song->artist  = $data->artist;

// Create post
if($song->update()){
    echo json_encode(
        array('message' => 'Song Updated',)
);
}else{
    echo json_encode(
        array('message' => 'Song Not Updated',)
    );
};
