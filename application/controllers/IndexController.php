<?php
/**
* Controller for the index page
*/
class IndexController extends SiteController
{
    function header($site_name = "") {
        include 'application/views/index/head.php';
        include 'application/views/essentials/header.php';
        include 'application/views/index/banner.php';
    }

    function content() {
    	$dbc = new DatabaseController();
    	$featured = [];
    	$intro = "";

    	
    }

    function footer() {
        parent::footer();
    }
	
}