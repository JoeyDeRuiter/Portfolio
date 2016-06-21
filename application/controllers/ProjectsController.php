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

    function content($id = null)
    {
        $mysqli = new DatabaseController();
        $featured = [];
        $projects = [];

        $sql = "SELECT `ID`, (SELECT `fullname` FROM `admins` WHERE `ID` = poster_id) AS `name`, `title`, `post`, `image`,`timestamp` FROM `posts` ORDER BY `timestamp` DESC LIMIT 5";

        // Fetch featured posts
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


        if($id == null) {

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
        } else {

            $sql = "SELECT `ID`, (SELECT `fullname` FROM `admins` WHERE `ID` = poster_id) AS `name`, `title`, `post`, `image`,`timestamp` FROM `posts` WHERE `ID` = ?";

            // Mysql Prepared statements
            if($stmt = $mysqli->prepare($sql))
            {
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($db_id, $db_poster, $db_title, $db_post, $db_img, $db_timestamp);

                if($stmt->num_rows >= 1) {
                    while($stmt->fetch()) {
                        $projects[] = new Post($db_id, $db_poster, $db_title, $db_post, $db_img, $db_timestamp);
                    }
                }else {
                    $projects[] = new Post("", "Page not found", "Page not found", "", "", "");
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