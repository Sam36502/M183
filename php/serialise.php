<?php

	require_once('User.php');

	if (!isset($_POST['uname'], $_POST['pword'])
		|| strcmp($_POST['uname'], '') == 0
		|| strcmp($_POST['pword'], '') == 0
	) {
		header("Location: ../index.php", true, 301);
		exit;
	}

	$uname = $_POST['uname'];
	$pword = $_POST['pword'];

	$payload = new User($uname, $pword, false);

	$serialised = serialize($payload);

	header("Location: ../index.php?o=" . $serialised, true, 301);
