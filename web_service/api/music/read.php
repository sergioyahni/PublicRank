<?php

//Headers
header("Access-Control-Allow-Origin: *");
header("'Content-Type: application/json'; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../models/Music.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante song object
$music = new Music($db);

$music->event = isset($_GET['event']) ? $_GET['event'] : die();
//DJ query
$result = $music->read();

//Get row count
$num = $result->rowCount();

//check if any DJs
if($num > 0){
    //DJs array;
    $data = array();
    $data['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
       extract($row);

       $music_item = array(
         'id'           =>  $id,
         'id_event'     =>  $id_event,
         'id_song'      =>  $id_song,
         'song_name'    =>  $song_name,
         'artist_name'  =>  $artist_name,
         'rating'       =>  $rating,
       );
       //push to the 'data'
       array_push($data['data'], $music_item);
    }
    // Turn it to JSON
    $json = json_encode_unicode($data);
    echo $json;

}else{
    echo json_encode(
        array('message' => 'לא נמצאו פריטים')
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
