<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>blog</title>
<link rel="stylesheet" type="text/css" href="./css/main.css">

</head>
<?php
	include 'include.php';
?>
<script src="../js/jquery.js"></script>

<body>
	<div class="header">
		<div class="logo"></div>
		<div class="nav">
			<ul class="nav_menu">
				<li><a href="./list.php">列表</a></li>
				<li><a href="./index.php">流</a></li>
				<li><a href="./email.html">邮箱</a></li>
				<li><a href="./QR.html">订阅</a></li>
			</ul>
		</div>
	</div>
	<div class="main">  
		<?php
				
			createPassage($_GET['file'],$dbObj);
					
		?>
	</div>
</body>
<script type="text/javascript">
	$(".like_icon").click(function(){
		var num = parseInt($(this).prev().text())+1;
		$(this).prev().text(num);
		$.post("updateData.php",{'like':num,'name':$(this).attr("name")});
	});
	$(".dislike_icon").click(function(){
		var num = parseInt($(this).prev().text())+1;
		$(this).prev().text(num);
		$.post("updateData.php",{'dislike':num,'name':$(this).attr("name")});
	})
</script>



</html>
