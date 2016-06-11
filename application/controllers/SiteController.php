<?php
/**
* Site class, contains most of 
*/
class SiteController
{
	
	function header($site_name = "") 
	{
		include 'application/views/essentials/head.php';
		include 'application/views/essentials/header.php';
	}

	function footer() 
	{
		include 'application/views/essentials/footer.php';
	}
}