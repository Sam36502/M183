<?php

	class fileHandler implements Serializable {
		public function __construct($file, $data) {
			$this->file = $file; 
			$this->data = $data;
		}
		
		public function serialize() {
			return serialize([
				$this->file,
				$this->data
			]);
		}

		public function unserialize($data) {
			list(
				$this->file,
				$this->data
			) = unserialize($data);
		}

		function __destruct() {
			file_put_contents($this->file, $this->data);
		}
	}
	
	
	if (!isset($_POST['content'], $_POST['file'])
		|| strcmp($_POST['content'], '') == 0
		|| strcmp($_POST['file'], '') == 0
	) {
		header("Location: ../index.html", true, 301);
		exit;
	}
	
	$content = $_POST['content'];
	$file    = $_POST['file'];
	
	$payload = new fileHandler($file, $content);
	
	$serialised = serialize($payload);
	header("Location: ../payload.php?pload=" . $serialised, true, 301);