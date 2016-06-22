<?php

class Post
{
    public $id = null;
    public $poster      = "";
    public $title       = "";
    public $poster_id   = null;
    public $poster_name = "";
    public $post        = "";
    public $category    = "";
    public $img         = "";
    public $timestamp   = "";

    public function __construct($id = null)
    {
        if($id != null) $this->load($id);
    }

    public function load($id)
    {
        $db = new DatabaseController();

        $sql = "SELECT `ID`,  `poster_id`, (SELECT `fullname` FROM `admins` WHERE `ID` = poster_id) AS `poster_name`, `title`, `post`, `category`, `image`, `timestamp` FROM `posts` WHERE `ID` = ?";

        if($stmt = $db->prepare($sql))
        {
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $stmt->store_result();
            $stmt->bind_result($db_id, $db_poster_id, $db_poster_name, $db_title, $db_post, $db_category, $db_image, $db_timestamp);

            // Load data
            if($stmt->num_rows >= 1) {
                $stmt->fetch();

                $this->id = $db_id;
                $this->poster_id = $db_poster_id;
                $this->poster_name = $db_poster_name;
                $this->title = $db_title;
                $this->post = $db_post;
                $this->category = $db_category;
                $this->img = $db_image;
                $this->timestamp = $db_timestamp;

                return true;
            }
        }
        return false;
    }

    public function save()
    {

    }
}