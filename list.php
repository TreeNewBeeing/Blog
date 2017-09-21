<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>blog</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
	include 'bin/include.php';
?>
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
		<div class="list">
			<ul>
				<?php
					$dir = HOST."/article/";
					$files = scandir($dir,1);
					foreach ($files as $file) {
						$suffix = substr($file,strpos($file,'.'));
						if(strcmp($suffix, ".txt")==0){
							createLi($file);
						}
						
					}
					
				?>
			</ul>

		</div>
	</div>
</body>
</html>
