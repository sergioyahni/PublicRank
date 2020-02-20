<?php

//Headers
header("Access-Control-Allow-Origin: *");
header("'Content-Type: application/json'; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../models/Event.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante DJ object
$event = new Event($db);

$event->id = isset($_GET['id']) ? $_GET['id'] : die();
//DJ query
$result = $event->read_single();

//Get row count
$num = $result->rowCount();

//check if any DJs
if($num > 0){
    //DJs array;
    $data = array();
    $data['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
       extract($row);

       $event_item = array(
         'id'           =>  $id,
         'id_dj'        =>  $id_dj,
         'dj_fname'     =>  $dj_fname,
         'dj_lname'     =>  $dj_lname,
         'name'         =>  $name,
         'type'         =>  $type,
         'permit'       =>  $permit,
         'participants' =>  $participants,
         'event_date'   =>  $event_date,
         'event_start'  =>  $event_start,
         'event_end'    =>  $event_end
       );
       //push to the 'data'
       array_push($data['data'], $event_item);
    }
    // Turn it to JSON
    $json = json_encode_unicode($data);
    echo $json;

}else{
    echo json_encode(
        array('message' => 'Event Not Found')
    );
}
function json_encode_unicode($data) {
	if (defined('JSON_UNESCAPED_UNICODE')) {
		return json_encode($data, JSON_UNESCAPED_UNICODE);
	}
	return preg_replace_callback('/(?<!\\\\)\\\\u([0-9a-f]{4})/i',
		function ($m) {
			$d = pack("H*", $m[1]);
			$r = mb_convert_encoding($d, "UTF8", "UTF-16BE");
			return $r!=="?" && $r!=="" ? $r : $m[0];
		}, json_encode($data)
	);
}
