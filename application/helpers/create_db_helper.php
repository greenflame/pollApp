<?php
	function create_db($db)
	{
		$query = $db->db->query( "CREATE TABLE if not exists `Users` (
		  `id` int(16) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `login` varchar(32) NOT NULL,
		  `password_hash` varchar(32) NOT NULL
		);");
	}
?>

