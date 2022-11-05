<?php
  $id = $_POST[ 'id' ];
  $pw = $_POST[ 'pw' ];
 
  if ( !is_null( $id ) ) {
    $con = mysqli_connect( 'localhost', 'root', 'root', 'web' );
    $sql = "SELECT * FROM signup WHERE id = '$id';";
    $result = mysqli_query( $con, $sql );
    
    $row=mysqli_fetch_array($result);
	    
    if(isset($row)){
	    
  	$password=$row['pw'];
	$hash=password_verify($pw,$password);
	if($hash===true){
		session_start();
		$_SESSION['id']=$row['id'];
		echo "<script>alert('로그인하신 아이디는 {$id} 입니다')
			location.href='./main.php'
			</script>";
		

    	}
	else{
		echo "<script>alert('로그인 실패')
			location.href='./index.html'
			</script>";
	}

    }
    else{
    	echo "<script>alert('로그인 실패')
		location.href='./index.html'
		</script>";
    }
  }


?>
