<?php
include "../bin/include.php";
$dir = "../article/";
$files = scandir($dir);
mysqli_query($dbObj,"truncate table articles");
foreach ($files as $file) {
	$suffix = substr($file,strpos($file,'.'));
	if(strcmp($suffix, ".txt")==0){
		mysqli_query($dbObj,"insert into articles(name) values(\"".$file."\")");
	}
}
$result = mysqli_query($dbObj,"select * from articles");
while($row = mysqli_fetch_assoc($result)){
	$filename = $row["name"];
    $file = "../article/".$filename;
    $date = filemtime($file);
    $query = "update articles set path=\"".$file."\",date=".$date." where name=\"".$filename."\"";
    mysqli_query($dbObj,$query);

}
?>
