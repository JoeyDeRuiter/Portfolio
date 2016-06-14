<?php

class FeaturedPost
{
    public $id;
    public $poster;
    public $title;
    public $post;
    public $img;
    public $timestamp;

    function __construct($id, $poster, $title, $post, $img, $timestamp)
    {
        $this->id = $id;
        $this->poster = $poster;
        $this->title = $title;
        $this->post = $post;
        $this->img = $img;
        $this->timestamp = $timestamp;
    }
}