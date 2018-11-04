<?php

if (isset($_GET['error'])) {
	$error_msg = $_GET['error'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>504 Error</title>
	<style type="text/css">
		h2{
			font-family: calibri;
			align-content: center;
		}
	</style>
</head>
<body>
	<h2><?php echo $error_msg; ?></h2>
</body>
</html>