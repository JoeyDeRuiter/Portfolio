<?php
/**
* Database controller for the MySQL database
*/
class DatabaseController extends mysqli
{
	private $db_host 		= "localhost";
	private $db_username 	= "portfolio";
	private $db_password 	= "jcWtNTNKXUATDTuP";
	private $db_database	= "portfolio";


	function __construct()
	{
		parent::__construct($this->db_host,
							$this->db_username,
							$this->db_password,
							$this->db_database);
	}
}