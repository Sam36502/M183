<?php

	class Thing implements Serializable {
		public $str;
		
		public function serialize() {
			return serialize($this->str);
		}
		
		public function unserialize($d) {
			$this->str = unserialize($d);
		}
		
		public function __wakeup() {
			$this->str .= "<i style='color:red'>I'm stupid.</i>";
		}
		
		function setStr($str) {
			$this->str = $str;
		}
		function getStr() {
			return $this->str;
		}
	}

	if (isset($_POST['serialised']) && strcmp($_POST['serialised'], '') != 0) {
		
		$serialised = $_POST['serialised'];
		
		// Deserialise Object
		$des = unserialize($serialised);
		
		var_dump($des);
		
		echo "<br><br><a href='form.html'>Back to Serialiser</a>";
		
	}