<?php

		session_start();
		
		include('config.inc');		

			$username = stripslashes($_POST['username']);
			$password = stripslashes($_POST['password']);
			$md5pass = md5($password);


			$conn = new mysqli($hostname,$dbuser,$dbpass,$dbname);
			if(mysqli_connect_errno()){
				echo "Connection failed" . mysqli_connect_error();
				exit();
			}

			$query = $conn->prepare("SELECT * FROM USERS WHERE username= ? and pass= ? ");
			
			$query->bind_param( "ss", $username, $md5pass );
			$query->execute();
			//$query->bind_result($resultid, $resultuser, $resultpsswd);
			$query->store_result();

			//if(($resultuser==$username)&&($resultpsswd==$md5pass)){
			if(($query->num_rows)==1){
				$_SESSION['username']=$username;
				header("location:main.php");
			}
			else{
				echo "login failed";
			}
			$query->close();
			$conn->close();
			
?>
