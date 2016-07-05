<?php
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

spl_autoload_register(function($class) {
    // Check if the controller exist in the controllers folder
    if(file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . $class . '.php'))
        include ROOT . DS . 'application' . DS . 'controllers' . DS . $class . '.php';

    if(file_exists(ROOT . DS . 'application' . DS . 'models' . DS . $class . '.php'))
        include ROOT . DS . 'application' . DS . 'models' . DS . $class . '.php';
});

$request_uri = explode('/', $_SERVER["REQUEST_URI"]);
$script_name = explode('/', $_SERVER["SCRIPT_NAME"]);

for ($i = 0; $i < count($script_name); $i++) {
    if($request_uri[$i] == $script_name[$i]) {
        unset($request_uri[$i]);
    }
}

$command = array_values($request_uri);


switch ($command[0]) {

    case 'contact':
        $ctr = new ContactController();
        $ctr->header("Contact");
        $ctr->content();
        $ctr->footer();
        break;

    case 'blog':
        $ctr = new BlogController();
        $ctr->header("Blog");

        if(isset($command[1])) $ctr->content($command[1]);
        else $ctr->content();

        $ctr->footer();
        break;

    case 'projects':
        $ctr = new ProjectsController();
        $ctr->header("Projecten");

        if(isset($command[1])) $ctr->content($command[1]);
        else $ctr->content();

        $ctr->footer();
        break;

    case '':
        $ctr = new IndexController();
        $ctr->header();
        $ctr->content();
        $ctr->footer();
        break;

    default:
        http_response_code(404);
        echo "<h1>Not found.</h1>";
        echo "<p>The requested URL " . $_SERVER['REQUEST_URI'] . " was not found on this server.</p>";
        break;
}