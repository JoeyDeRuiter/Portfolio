<?php
/**
 * Controller for the index page
 */
class ProjectsController extends SiteController
{

    /* Override */
    function header($site_name = "")
    {
        include 'application/views/essentials/head.php';
        include 'application/views/essentials/header.php';
    }

    function content()
    {
        $mysqli = new DatabaseController();
        $featured = [];
        $projects = [];

        $sql = "SELECT `ID`, (SELECT `fullname` FROM `admins` WHERE `ID` = poster_id) AS `name`, `title`, `post`, `image`,`timestamp` FROM `posts` ORDER BY `timestamp` DESC LIMIT 5";

        // Mysql Prepared statements
        if($stmt = $mysqli->prepare($sql))
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($db_id, $db_poster, $db_title, $db_post, $db_img, $db_timestamp);

            if($stmt->num_rows >= 1) {
                while($stmt->fetch()) {
                    $featured[] = new Post($db_id, $db_poster, $db_title, $db_post, $db_img, $db_timestamp);
                }
            }
        }

        $sql = "SELECT `ID`, (SELECT `fullname` FROM `admins` WHERE `ID` = poster_id) AS `name`, `title`, `post`, `image`,`timestamp` FROM `posts` ORDER BY `timestamp` DESC";

        // Mysql Prepared statements
        if($stmt = $mysqli->prepare($sql))
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($db_id, $db_poster, $db_title, $db_post, $db_img, $db_timestamp);

            if($stmt->num_rows >= 1) {
                while($stmt->fetch()) {
                    $projects[] = new Post($db_id, $db_poster, $db_title, $db_post, $db_img, $db_timestamp);
                }
            }
        }

        include ROOT . DS . 'application' . DS . 'views' . DS . 'projects' . DS . 'content.php' ;
    }

    /* Override */
    function footer()
    {
        parent::footer();
    }

}