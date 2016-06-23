<?php
class BlogController extends SiteController
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
        $posts = [];

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

        if($id === null) {
            // Fetch blog posts
            $sql = "SELECT `ID` FROM `blogs` ORDER BY `timestamp`";
            if($stmt = $mysqli->prepare($sql))
            {
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($db_id);

                if($stmt->num_rows >= 1)
                {
                    while($stmt->fetch())
                    {
                        $posts[] = new BlogPost($db_id);;
                    }
                }
            }
        }
        else
        {
            // Fetch single blog post on ID
            $sql = "SELECT `ID` FROM `blogs` WHERE `ID` = ?";
            if($stmt = $mysqli->prepare($sql))
            {
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($db_id);

                if($stmt->num_rows >= 1)
                {
                    $stmt->fetch();
                    $post = new BlogPost($db_id);
                    $posts[] = $post;
                }
            }
        }

        include ROOT . DS . 'application' . DS . 'views' . DS . 'blog' . DS . 'content.php';
    }
}