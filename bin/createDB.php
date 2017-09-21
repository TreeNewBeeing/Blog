<?php
include 'include.php';
$dbObj->query("create database blog");
$dbObj->query("use blog");
$dbObj->query("create table article(name varchar(20), likeNum int NOT NULL default 0, dislikeNum int NOT NULL default 0)");
$dir = HOST."/article";
$dbObj->query("truncate table article");
$files = scandir($dir);
foreach ($files as $file) {
	$suffix = substr($file,strpos($file,'.'));
	if(strcmp($suffix, ".txt")==0){
		$dbObj->query("insert into article(name) values(\"".$file."\")");
	}
}
?>
