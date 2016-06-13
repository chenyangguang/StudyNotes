<?php
if (isset($_REQUEST['authcode'])) {
	session_start();
	if (strtolower($_REQUEST['authcode'] )== $_SESSION['authcode']) {
		echo "<font color='#0000CC'>输入正确</font>";
	} else {
		echo "<font color='#CC0000'>输入错误</font>";
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>确认验证码</title>
</head>
<body>
	<form action="./form.php" method="post" accept-charset="utf-8">
	<p>验证码图片: 
		<img id="captch-img" src="./captcha.php?r=<?php echo rand(); ?>" border="1" width="100" height="30" onclick=>

		<a href="javascript:void(0)" onclick="document.getElementById('captch-img').src='./captcha.php?r='+Math.random()">换一个</a>
</p>

	<p>请输入图片中的内容：<input type="text" name="authcode" value="" /></p>

	<p><input type="submit" value="提交" style="padding:6px 20px"></p>
	</form>
</body>
</html>
