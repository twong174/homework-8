<?php

namespace app\controllers;
use app\models\Post;

class PostController
{
    public function getPosts() {
        $params = [
            'title' => $_GET['title'] ?: null,
        ];
        $postModel = new Post();
        $posts = $postModel->getAllPostsByTitle($params);
        header("Content-Type: application/json");
        echo json_encode($posts);
        exit();
    }

    public function savePost() {
        $title = $_POST['title'] ?: null;
        $content = $_POST['content'] ?: null;
        $errors = [];

        if (!$title || strlen($title) < 3) {
            $errors['title'] = 'Title must be at least 3 characters long.';
        }

        if (!$content || strlen($content) < 5) {
            $errors['content'] = 'Content must be at least 5 characters long.';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $postModel = new Post();
        $newPost = $postModel->savePost(['title' => $title, 'content' => $content]);
        echo json_encode($newPost);
        exit();
    }
}
