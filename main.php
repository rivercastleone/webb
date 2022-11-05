<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>MAIN PAGE</title>
	<body>
<?php
	session_start();
	if(!isset($_SESSION['id'])){
		echo	"<script>location.href='./index.html'</script>";
	}

	else{
		$userid=$_SESSION['id'];


		echo"<p>{$userid}님 안녕하세요</p>";

	}
?>
<button type"button" onClick="location.href='logout.php'">로그아웃</button>	
</body>
</html>


	
		
