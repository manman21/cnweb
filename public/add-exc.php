<?php
	include("lib_db.php");
	//include("utils.php");
if ($_REQUEST['table'] == 'baihat') 
{
    //echo $_REQUEST["playlist"]; exit();
  	$tbl = isset($_REQUEST["table"]) ? $_REQUEST["table"] : "";
  	//echo (":".$tbl.":");exit();
    $img = upload_file_by_name('img', $tbl);
    //echo (":".$img.":");exit();
    $img_square = upload_file_by_name('img_square', $tbl);
    //echo (":".$img_square.":");exit();
    $audio = upload_file_by_name('audio', $tbl);
    //echo ($audio);exit();
    $name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : "";
    //echo (":".$name.":");exit();
    $album = isset($_REQUEST["album"]) ? getIdbyname($_REQUEST["album"],"album") : "";
    //echo (":".$album.":");exit();
    $theloai = isset($_REQUEST["theloai"]) ? getIdbyname($_REQUEST["theloai"],"theloai") : "";
    //echo (":".$theloai.":");exit();
    $playlist = isset($_REQUEST["playlist"]) ? getIdbyname($_REQUEST["playlist"],"playlist") : "";
    //echo (":".$playlist.":");exit();
    $nghesi = isset($_REQUEST["nghesi"]) ? getIdbyname($_REQUEST["nghesi"],"nghesi") : "";
    //echo ($nghesi);exit();
    $data = array();
    $data["name"] = $name;
	$data["img"] = $img;
	$data["img_square"] = $img_square;
	$data["audio"] = $audio;
	$data["idAlbum"] = $album;
	$data["idTheloai"] = $theloai;
	$data["idPlaylist"] = $playlist;
	$data["idNghesi"] = $nghesi;
	
	$sql = data_to_sql_insert($tbl, $data);
	//print_r($sql);exit();
	$ret = exec_update($sql); 
	if ($ret == "1"){
		echo "Thêm bài hát thành công";exit();
	} else {
		echo "Thêm bài hát thất bại";
	}
}
function getIdbyname($name,$table){
	if(!isset($name) || !isset($table) )
	{
		return "";
	}
	$listName = explode(",", $name);
	$listId = array();
	$sql = "";
	foreach ($listName as $value) {
		$sql = "select id from ".$table." where name = '".$value."'";
		//print_r($sql);exit();
		$id = select_one($sql);
		//print_r($id);exit();	
		array_push($listId, $id["id"] );
	}
	//print_r($listId);exit();
	$Id = implode(",", $listId);
	return $Id;
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
?>