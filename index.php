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
<script src="./js/jquery.js"></script>

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
			$dir = HOST."/article/";
			$files = scandir($dir,1);
			$n = 0;
			foreach ($files as $file) {
				$suffix = substr($file,strpos($file,'.'));
				if(strcmp($suffix, ".txt")==0){
					createPassage($file,$dbObj);
				}
				$n++;
				if($n>10){
					break;
				}
					
			}
		?>
	</div>
</body>
<script type="text/javascript">
	window.onscroll = function(){
		if (document.body.scrollTop > 210 || document.documentElement.scrollTop > 210) {
			$(".nav").addClass("fixed");
		}	
		if (document.body.scrollTop <= 210 && document.documentElement.scrollTop <= 210) {
			$(".nav").removeClass("fixed");
		}	
	};
	
	function iconclick(like,a){
		c=like?'like':'dislike';
		b=like?'dislike':'like';
		bicon="."+b+"_icon";
		var num = parseInt($(a).prev().text());
                if($(a).attr("click") == "true"){
                        $(a).removeClass("clicked");
                        $(a).addClass("unclicked");
                        $(a).attr("click","false");
                        num--;
			$(a).parent().parent().find(bicon).click(function(){
                		iconclick(!like,this);
        		});
                }else{
                        $(a).removeClass("unclicked");
                        $(a).addClass("clicked");
                        $(a).attr("click","true");
                        num++;
			$(a).parent().parent().find(bicon).unbind("click");
                }
		//alert(c+" "+b+" "+bicon);
                $(a).prev().text(num);
		var info = {'name':$(a).attr("name")};
		info[c]= num;
                $.post("bin/updateData.php",info);
	}
	$(".dislike_icon").click(function(){
		iconclick(false,this);
	});
	$(".like_icon").click(function(){
		iconclick(true,this);
	});
</script>



</html>
