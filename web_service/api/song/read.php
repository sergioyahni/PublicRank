<?php

//Headers
header("Access-Control-Allow-Origin: *");
header("'Content-Type: application/json'; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../models/Song.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante song object
$song = new Song($db);

$song->dj = isset($_GET['dj']) ? $_GET['dj'] : die();
//DJ query
$result = $song->read();

//Get row count
$num = $result->rowCount();

//check if any DJs
if($num > 0){
    //DJs array;
    $data = array();
    $data['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
       extract($row);

       $song_item = array(
         'id'           =>  $id,
         'id_dj'        =>  $id_dj,
         'name'         =>  $name,
         'genere'       =>  $genere,
         'url'          =>  $url,
         'artist'       =>  $artist
       );
       //push to the 'data'
       array_push($data['data'], $song_item);
    }
    // Turn it to JSON
    $json = json_encode_unicode($data);
    echo $json;

}else{
    echo json_encode(
        array('message' => 'No Items Found')
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
