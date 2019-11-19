<?php

//Headers
//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../models/DJ.php';

//Instantiate DB Object
$database = new Database();
$db = $database->connect();

//instantiante single dj object
$dj = new DJ($db);

//Get id from URL
$dj->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get Post
$dj->read_single();

//Create array
$data = array(
    'id'            => $dj->id,
    'first_name'    => $dj->first_name,
    'last_name'     =>  $dj->last_name,
    'email'         =>  $dj->email,
    'phone'         =>  $dj->phone,
    'website'       =>  $dj->website,
    'facebook'      => $dj->facebook,
    'about'         =>  $dj->about,
    'location'      => $dj->location,
    'image'         =>  $dj->image,
    'created_date'  => $dj->created_date,
);

//Create JSON
$json = json_encode_unicode($data);
echo $json;
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
