<?php

namespace app\models;

class Post {
    private $posts = [
        [
            'id' => '1',
            'title' => 'First Post',
            'content' => 'This is the content of the first post.'
        ],
        [
            'id' => '2',
            'title' => 'Second Post',
            'content' => 'This is the content of the second post.'
        ],
    ];

    public function getAllPostsByTitle($params) {
        if (!empty($params['title'])) {
            return array_filter($this->posts, function ($post) use ($params) {
                return stripos($post['title'], $params['title']) !== false;
            });
        }
        return $this->posts;
    }

    public function savePost($data) {
        // This function will eventually save to a database
        $newPost = [
            'id' => count($this->posts) + 1,
            'title' => htmlspecialchars($data['title']),
            'content' => htmlspecialchars($data['content']),
        ];
        $this->posts[] = $newPost;
        return $newPost;
    }
}
