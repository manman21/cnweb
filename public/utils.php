<?php
include("lib_db.php");

function default_statuses(){
	$ret[] = array("id"=>1,"name"=>"Online");
	$ret[] = array("id"=>2,"name"=>"Offline");
	return $ret;
}
function getIdbyname($name,$table){
	if(!isset($name) || !isset($table) )
	{
		return "";
	}
	$listName = explode(",", $name);
	$listId = "";
	$id = 0;
	$sql = "";
	foreach ($list as $value) {
		$sql = "select id from ".$table." where name = ".$value;
		$id = select_one($sql);
		array_push($listId, $id );
	}
	return implode(",", $listId);
}
function getNamebyid($id,$table){
	if(!isset($id) || !isset($table) )
	{
		return "";
	}
	$listId = explode(",", $id);
	$listName = "";
	$name = "";
	$sql = "";
	foreach ($list as $value) {
		$sql = "select id from ".$table." where ".$id." = ".$value;
		$name = select_one($sql);
		array_push($listName, $name);
	}
	return implode(",", $listName);
}
function upload_file_by_name($name, $table, $target_dir=""){
	//print("upload_file_by_name->name=[{$name}]");
	if (!isset($_FILES[$name])){
		//print("upload_file_by_name->name=[{$name}], khong co file");
		return "";
	}
	switch ($table) {
		case 'album':
			$target_dir = "images/album/";
			break;
		case 'chude':
			$target_dir = "images/chude/";
			break;
		case 'nghesi':
			$target_dir = "images/nghesi/";
			break;
		case 'playlist':
			$target_dir = "images/playlist/";
			break;
		case 'quangcao':
			$target_dir = "images/quangcao/";
			break;
		case 'theloai':
			$target_dir = "images/theloai/";
			break;
		case 'baihat':
			$target_dir = "images/baihat/";
			break;
		default:
			$target_dir = "uploads/";
			break;
	}

	//print("upload_file_by_name->target_dir=[{$target_dir}]");
	$fdata = $_FILES[$name];
	//print_r($fdata);exit();
	$ext = strtolower(pathinfo($fdata["name"],PATHINFO_EXTENSION));
	//print_r($ext);exit();
	//return($ext);
	if($ext == "mp3")
	{
		$target_dir = "audio/";
	}
	$target_file = $target_dir . basename($fdata["name"],".{$ext}") . date('-Ymd-his') . ".{$ext}";
	//print_r($target_file);exit();
	//print("upload_file_by_name->target_file=[{$target_file}]");
	//print("upload_file_by_name->ext=[{$ext}]");
	if (!is_dir($target_dir)){
		mkdir($target_dir);
	}
	if (move_uploaded_file($fdata["tmp_name"], $target_file)) {
		return $target_file;
	}
	return "";
}
