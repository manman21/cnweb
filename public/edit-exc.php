<?php
	include("lib_db.php");
	include("utils.php");
if ($_REQUEST['table'] == 'baihat') 
{
    //echo $_REQUEST["playlist"]; exit();
  	$tbl = isset($_REQUEST["table"]) ? $_REQUEST["table"] : "";
  	//echo (":".$tbl.":");exit();
  	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
    $img = isset($_REQUEST["img"]) ? upload_file_by_name('img', $tbl) : "";
    //echo (":".$img.":");exit();
    $img_square = isset($_REQUEST["img_square"]) ? upload_file_by_name('img_square', $tbl) : "";
    //echo (":".$img_square.":");exit();
    $audio = isset($_REQUEST["audio"]) ? upload_file_by_name('audio', $tbl) : "";
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
    if($name != "")    $data["name"] = $name;
	if($img != "")		$data["img"] = $img;
	if($img_square != "")		$data["img_square"] = $img_square;
	if($audio != "")		$data["audio"] = $audio;
	if($album != "")		$data["idAlbum"] = $album;
	if($theloai != "")		$data["idTheloai"] = $theloai;
	if($playlist != "")		$data["idPlaylist"] = $playlist;
	if($nghesi != "")		$data["idNghesi"] = $nghesi;
	
	$sql = data_to_sql_update($tbl, $data, $id);
	//print_r($sql);exit();
	$ret = exec_update($sql); 
	if ($ret == "1"){
		echo "Sửa bài hát thành công";exit();
	} else {
		echo "Sửa bài hát thất bại";
	}
}

?>