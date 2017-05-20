<?php
/**
 * Created by PhpStorm.
 * User: haroldport
 * Date: 17/05/17
 * Time: 23:02
 */

namespace App;


class Post
{

    public function getPosts($session)
    {
        if(!$session->has('posts')){
            $this->createDummyData($session);
        }
        return $session->get('posts');
    }

    public function getPost($session, $id)
    {
        if(!$session->has('posts')){
            $this->createDummyData($session);
        }
        return $session->get('posts')[$id];
    }

    public function addPost($session, $title, $content)
    {
        if(!$session->has('posts')){
            $this->createDummyData($session);
        }
        $posts = $session->get('posts');
        array_push($posts, ['title' => $title, 'content' => $content]);
        $session->put('posts', $posts);
    }

    public function editPost($session, $id, $title, $content)
    {
        $posts = $session->get('posts');
        $posts[$id] = ['title' => $title, 'content' => $content];
        $session->put('posts', $posts);
    }

    private function createDummyData($session)
    {
        $posts = [
          [
              'title' => 'Learning Laravel',
              'content' => 'This blog post will get you right on track with Laravel!'
          ],
          [
              'title' => 'Something else',
              'content' => 'Some other content'
          ]
        ];

        $session->put('posts', $posts);
    }

}