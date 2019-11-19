<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, content-Type, Allow-Methods, Authorization, x-Requested With');


include_once '../../config/Database.php';
include_once '../../models/Event.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$event = new Event($db);

//Get raw DJ data
$data = json_decode(file_get_contents("php://input"));

$event->id_dj        = $data->id_dj;
$event->name         = $data->name;
$event->type         = $data->type;
$event->permit       = $data->permit;
$event->participants = $data->participants;
$event->event_date   = $data->event_date;
$event->event_start  = $data->event_start;
$event->event_end    = $data->event_end;

// Create post
if($event->create()){
    echo json_encode(
        array('message' => 'Post Created',)
);
}else{
    echo json_encode(
        array('message' => 'Post Not Created',)
    );
};
