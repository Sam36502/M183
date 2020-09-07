<?php

	class User {
		public $uname;
		public $pword;
		public $isAdmin;
		
		__construct($uname, $pword) {
			$this->uname = $uname;
			$this->pword = $pword;
			$this->isAdmin = false;
		}
	}

	if (!isset($_POST['uname'], $_POST['pword'])
		|| strcmp($_POST['uname'], '') == 0
		|| strcmp($_POST['pword'], '') == 0) {
		
		header('Location: ../index.html', 301, true);
		exit;
	}
	
	$uname = $_POST['uname'];
	$pword = $_POST['pword'];
	
	$usr = new User($uname, $pword);
	$str = serialize($usr);
	
	echo "<i>Serialised String:</i><code>" . $str . "</code>";
	