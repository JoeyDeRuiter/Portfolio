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
        $projects_game = [];
        $projects_other = [];

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

        // Index list
        if($id == null) {

            $sql = "SELECT `ID` FROM `posts` ORDER BY `timestamp` DESC";

            // Mysql Prepared statements
            if($stmt = $mysqli->prepare($sql))
            {
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($db_id);

                if($stmt->num_rows >= 1) {
                    while($stmt->fetch()) {
                        $post = new Post($db_id);

                        // Filter out everything except the first <p> tag
                        preg_match('/<p>(.*?)<\/p>/', $post->post, $tmp_post);
                        $post->post = $tmp_post[0];

                        if($post->category == "game")
                            $projects_game[] = $post;
                        else
                            $projects_other[] = $post;
                    }
                }
            }
        } else {
        // Specific posts
            $sql = "SELECT `ID` FROM `posts` WHERE `ID` = ?";

            // Mysql Prepared statements
            if($stmt = $mysqli->prepare($sql))
            {
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($db_id);

                if($stmt->num_rows >= 1) {
                    while($stmt->fetch()) {
                        $projects[] = new Post($db_id);
                    }
                }else {
                    $post = new Post();
                    $post->title = "Project not found";
                    $post->poster_name = "A hidden monkey";
                    $projects[] = $post;
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