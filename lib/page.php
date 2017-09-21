<?php

function createPassage($article,$dbObj){
	echo '<div class="passage">';
	$myfile = fopen(HOST."/article/".$article, "r") or die("Unable to open file!");
	createTitle(fgets($myfile),fgets($myfile));
	while(!feof($myfile)) {
			echo fgets($myfile)."<br>";
	}
	fclose($myfile);
	createFooter($article,$dbObj);
	echo '</div>';
}

function createFooter($article,$dbObj){
	$filetime = basename($article);
	$date = substr($filetime,0,4)."-".substr($filetime,4,2)."-".substr($filetime,6,2);
	//$time = strtotime($timestring);
	//$date = date("Y-m-d",$time);
	$result = $dbObj->query("select likeNum,dislikeNum from article where name=\"".$article."\"");
	$row = $result->fetch_array();
	$like = $row['likeNum'];
	$dislike = $row['dislikeNum'];
	echo '<div class="footer">
			<div class="time">
				更新于'.$date.'	
			</div>
			<div class="like">
				<div class ="num">
				'.(int)$like.'
				</div>
				<div class="like_icon unclicked" click="false" name="'.$article.'">
					赞
				</div>
			</div>
			<div clss="dislike">
			    <div class ="num">
				'.(int)$dislike.'
				</div>
				<div class="dislike_icon unclicked" click="false" name="'.$article.'">
					恶
				</div>
			</div>
		</div>';
}

function createTitle($name,$author){
	echo '<div class="title">
			<div class="name">';
	echo $name;
	echo '	</div>
			<div class="author">
				<div class="name">';
	echo '-----'.$author;
	echo '		</div>
			</div>
		 </div>';
}

function createLi($article){
	$myfile = fopen(HOST."/article/".$article, "r") or die("Unable to open file!");
	echo '<li><a href="createPassage.php?file='.$article.'">'.fgets($myfile).'</a></li>';
}
?>
