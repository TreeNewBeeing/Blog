<?php
	include 'include.php';
 	if(isset($_POST['like'])){
 		$info = array('likeNum'=>$_POST['like']);
		$where = 'name="'.$_POST['name'].'"';
		$tableName = "article";
        	if ($where) {
			$sql = '';
       			foreach ($info as $k => $v) {
                		$sql .= ", $k=$v";
            		}
            		$sql = substr($sql, 1);

            		$sql = "UPDATE `$tableName` SET $sql WHERE $where";
        	} else {
            		$sql = "REPLACE INTO `$tableName`(`" . implode('`,`', array_keys($info)) . "`) VALUES('" . implode("','", $info) . "');";
        	}
		
        	$dbObj->query($sql);
		echo $dbObj->error;
   		 

	}
	if(isset($_POST['dislike'])){
		$info = array('dislikeNum'=>$_POST['dislike']);
		$where = 'name="'.$_POST['name'].'"';
		$tableName = "article";
        	if ($where) {
            		$sql = '';

       			foreach ($info as $k => $v) {
                		$sql .= ", $k=$v";
            		}
            		$sql = substr($sql, 1);

            		$sql = "UPDATE `$tableName` SET $sql WHERE $where";
        	} else {
            	$sql = "REPLACE INTO `$tableName`(`" . implode('`,`', array_keys($info)) . "`) VALUES('" . implode("','", $info) . "')";
        	}
        	$dbObj->query($sql);
    
	}
?>
