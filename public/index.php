<?php
require "../app/models/Post.php";
require "../app/controllers/PostController.php";

use app\controllers\PostController;

$url = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $url);

if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->getPosts();
}

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/posts.html';
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postController = new PostController();
    $postController->savePost();
}

if ($uriArray[1] === 'add-posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/add-posts.html';
}
