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

    }
}