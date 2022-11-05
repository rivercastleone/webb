<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 1 );

$id = $_POST[ 'id' ];
$pw = $_POST[ 'pw' ];
 
  if ( !is_null( $id ) ) {
    $jb_conn = mysqli_connect( 'localhost', 'root', 'root', 'web' );
    $jb_sql = "SELECT id FROM signup WHERE id = '$id';";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
    $jb_row = mysqli_fetch_array( $jb_result );
    
    
 
            
     
    if($jb_row==NULL) {
      $encrypted_password = password_hash( $pw, PASSWORD_DEFAULT);
      $jb_sql_add_user = "INSERT INTO signup ( id, pw ) VALUES ( '$id', '$encrypted_password' );";
      $check=mysqli_query( $jb_conn, $jb_sql_add_user );

      echo "<script>alert('회원가입된 아이디는{$id} 입니다')
	      location.href='./index.html'</script>";
            
    }
    else if($id==""){
	    echo "<script>alert('아이디와 비밀번호를 입력해주세요')
		    location.href='./index.html'</script>";
    	
    } 
    else{
	    echo "<script>alert('중복된 아이디입니다')
		    location.href='./index.html'
			</script>";
 	 }
  } 
?>
