<?php

	class User implements Serializable {
		public function __construct($username, $password, $isadmin) {
			$this->username = $username;
			$this->password = $password;
      $this->isadmin = $isadmin;
		}

		public function serialize() {
			return serialize([
				$this->username,
				$this->password,
        $this->isadmin
			]);
		}

		public function unserialize($data) {
			list(
				$this->username,
				$this->password,
        $this->isadmin
			) = unserialize($data);
		}
	}
