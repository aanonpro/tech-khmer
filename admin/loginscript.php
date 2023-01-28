<?php
	session_start();
	include_once('connector.php');
	
	if(ISSET($_POST['btnlogin']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM tb_users WHERE email =? AND password =? ";
		$query = $conn->prepare($sql);
		$query->execute(array($email,$password));
		$row = $query->rowCount();
		$fetch = $query->fetch();
		if($row >0)
		{
			$_SESSION['ROLE']=$fetch['role'];
			$_SESSION['IS_LOGIN']='yes';
			$_SESSION['userid'] = $fetch['user_id'];
			$_SESSION['uname'] = $fetch['name'];
			if($fetch['role'] ==1){
				header('location: index.php');
				die();
			 }
			 if($fetch['role'] ==0){
				header('location: index.php');
			}
		}
		else
		{
			echo "<script>alert('Invalid Suername/Email or Password!')</script>
				  <script>window.location='login.php'</script>";
		}
	}
?>