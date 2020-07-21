<?php 
	require_once "../../config.php"
	namespace Edu\Board\Support;

	/**
	 * Database Managements
	 */
	abstract class Database
	{
		
		/**
		 * Server Information
		 */
		private $host = HOST;
		private $user = USER;
		private $pass = PASS;
		private $db = DB;
		private $connection;

		/**
		 * Database connection
		 */
		private function connection()
		{
			$this -> connection = new PDO("mysql:host=". $this -> host .";db_name=" .$this -> db,$this -> user,$this -> pass)
		}



	}