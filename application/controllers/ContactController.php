<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 22-6-2016
 * Time: 16:43
 */

class ContactController extends SiteController
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

        $sql = "SELECT `ID` FROM `posts` ORDER BY `timestamp` DESC LIMIT 5";

        // Mysql Prepared statements
        // Featured list
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

        include ROOT . DS . 'application' . DS . 'views' . DS . 'contact' . DS . 'content.php';
    }
}