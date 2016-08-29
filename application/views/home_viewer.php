<?php
	if($is_authorized)
	{
		echo $blog_logout;
		echo $blog_registered_users;
	}
	else
		echo $blog_authorization;
?>