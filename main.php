<?php

session_start();

if(!isset($_SESSION['username'])){
	header("location:login.html");
}
?>

<html>
<body>
  <head1>
	Welcome
  </head1>
  <br />
  <p>
	<a href="logout.php">Logout</a>
  </p>
</body>
</html>
