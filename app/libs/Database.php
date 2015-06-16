<?php
class Database extends PDO{
	function __construct() {
		try {
			parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER,DB_PASS,DB_OPTION);
			//echo "Connected";
		} catch (PDOException $e) {
			//echo 'Connection failed: ' . $e->getMessage();
		}
	}
}