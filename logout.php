<?php
	session_start();
	session_destroy();
	echo "<script>alert('안녕히 가세요')
		location.href='./index.html'
		</script>";?>
