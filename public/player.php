<?php
include("lib_db.php");
include("utils.php");
if($_REQUEST["id"]){
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	$topSql = "SELECT * FROM baihat where id = {$id}";
	$data = select_one($topSql);

	$nghesiSql = "SELECT * FROM nghesi ";
	$allNghesi = select_one($nghesiSql);

	//print_r($data["idNghesi"]);exit();
	$nghesi = getNamebyid($data["idNghesi"],"nghesi");
	//print_r($nghesi);exit();

	$baihat = array();
	$response = array();
	array_push($response, $nghesi , $data["name"], $data["img_square"], $data["audio"]);
	// $response ["nghesi"] = $nghesi;
	// $response ["name"] = $data["name"];
	// $response ["img"] = $data["img_square"];
	// $response ["audio"] = $data["audio"];
	$x = json_encode($response);
	print_r($x);
}
?>