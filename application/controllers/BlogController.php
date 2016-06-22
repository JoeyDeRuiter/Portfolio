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

        // Fetch blog posts
        $sql = "SELECT `ID` FROM `blogs` ORDER BY `timestamp`";
        if($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($db_id);

            if($stmt->num_rows >= 1)
            {
                while($stmt->fetch())
                {
                    $post = new BlogPost($db_id);
                    // Filter out everything except the first <p> tag
                    preg_match('/<p>(.*?)<\/p>/', $post->post, $tmp_post); 
                    $post->post = $tmp_post[0];
                    $posts[] = $post;
                }
            }
        }

        include ROOT . DS . 'application' . DS . 'views' . DS . 'blog' . DS . 'content.php';
    }
}