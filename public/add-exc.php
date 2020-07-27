<?php
	include("lib_db.php");
	include("utils.php");
if ($_FILES != '') 
{
  
    $img = upload_file_by_name('img', 'baihat');
    $img_square = upload_file_by_name('img-square', 'baihat');
    $audio = upload_file_by_name('audio', 'baihat');
    //echo ($img.":".$img_square.":".$audio);
    //echo ($audio);
    $name = isset($_REQUEST["name"])? isset($_REQUEST["name"]) : "";
    $album = isset($_REQUEST["album"])? getIdbyname($_REQUEST["album"],"baihat") : "";
    $theloai = isset($_REQUEST["theloai"])? getIdbyname($_REQUEST["theloai"],"baihat") : "";
    $playlist = isset($_REQUEST["playlist"])? getIdbyname($_REQUEST["playlist"],"baihat") : "";
    $nghesi = isset($_REQUEST["nghesi"])? getIdbyname($_REQUEST["nghesi"],"baihat") : "";
    echo ($name);exit();
    $data = array();
    $data["name"] = $name;
	$data["img"] = $img;
	$data["img_square"] = $img_square;
	$data["audio"] = $audio;
	$data["album"] = $album;
	$data["theloai"] = $theloai;
	$data["playlist"] = $playlist;
	$data["nghesi"] = $nghesi;
	$tbl = "baihat";
	$sql = data_to_sql_insert($tbl, $data);
	//print_r($sql);exit();
	$ret = exec_update($sql); 
	echo $ret;
}
?>