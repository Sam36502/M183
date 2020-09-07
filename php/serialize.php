<?php

	// Define the class to serialise
	class Thing implements Serializable {
		public $str;
		
		public function serialize() {
			return serialize($this->str);
		}
		
		public function unserialize($d) {
			$this->str = unserialize($d);
		}
		
		public function __wakeup() {
			echo "<i style='color:red'>I'm Stupid</i>";
		}
		
		function setStr($str) {
			$this->str = $str;
		}
		function getStr() {
			return $this->str;
		}
	}

	if (isset($_POST['string']) && strcmp($_POST['string'], '') != 0) {
		
		$str = $_POST['string'];
		
		$obj = new Thing();
		$obj->setStr($str);
		
		// Serialise Object
		$serialised = serialize($obj);
		
		$HTML =  "<h1>Serialized Object:</h1>";
		$HTML .= "<code>";
		$HTML .= $serialised;
		$HTML .= "</code>";
		$HTML .= "<br><br><a href='deser.html'>Back to Deserialiser</a>";
		echo $HTML;
		
	}
?>