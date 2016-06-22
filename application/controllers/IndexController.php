<?php
/**
* Controller for the index page
*/
class IndexController extends SiteController
{

    /* Override */
    function header($site_name = "") 
    {
        include 'application/views/index/head.php';
        include 'application/views/essentials/header.php';
        include 'application/views/index/banner.php';
    }

    function content() 
    {
    	$mysqli = new DatabaseController();
    	$featured = [];

        $sql = "SELECT `ID` FROM `posts` ORDER BY `timestamp` DESC LIMIT 5";

        // Mysql Prepared statements
        if($stmt = $mysqli->prepare($sql))
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($db_id);

            if($stmt->num_rows >= 1) {
                while($stmt->fetch()) {
                    $featured[] = new Post($db_id);
                }
            }
        }


        //var_dump($featured);
        include 'application/views/index/content.php';
    }

    /* Override */
    function footer() 
    {
        parent::footer();
    }
	
}