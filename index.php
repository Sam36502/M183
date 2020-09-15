<!DOCTYPE html>
<html>
	<head>
		<title>Insecure Deserialisation</title>
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>

		<h1>Insecure Deserialisation Demo</h1>

		<hr>

		<h2>Login Form</h2>

		<form id="demo" action="php/serialise.php" method="post">
			<table>
				<tr>
					<th>Username</th>
					<td><input type="text" name="uname"></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><input type="password" name="pword"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Login"></td>
				</tr>
			</table>
		</form>

		<hr>

		<h2>Intercepted Object</h2>

		<form id="intercept" action="php/vulnerable.php" method="post">
			<table>
				<tr>
					<th>Serialised Object</th>
					<td>
						<textarea name="content" form="intercept"><?php
							if (isset($_GET['o'])) { echo $_GET['o']; }
						?></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Send to Login"></td>
				</tr>
			</table>
		</form>

	</body>
</html>
