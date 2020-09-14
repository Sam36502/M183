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

	$data = unserialize($_POST['data']);