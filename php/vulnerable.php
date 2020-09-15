<?php

	require_once('User.php');

	if (!isset($_POST['content'])
		|| strcmp($_POST['content'], '') == 0
	) {
		header("Location: ../index.php", true, 301);
		exit;
	}

	$data = unserialize($_POST['content']);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Unsecure Deserialisation</title>
		<link rel="stylesheet" href="../style/style.css">
	</head>
	<body>
			<h1>Logged in as <?= $data->username ?></h1>

			<?php
				if ($data->isadmin) {
					echo '<i style="color:green">Logged in as an admin!</i>';
				} else {
					echo '<i style="color:red">NOT logged in as an admin!</i>';
				}
			?>

			<hr>
			<a href="../index.php">Back to login</a>
	</body>
</html>
