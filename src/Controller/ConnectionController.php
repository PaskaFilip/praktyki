<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ConnectionController extends AbstractController
{
    #[Route('/populate', name: 'fill')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $http = HttpClient::create();
        $result = $http->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $userspost = $result->toArray();
        $result = $http->request('GET', 'https://jsonplaceholder.typicode.com/users');
        $users = $result->toArray();
        $posts = [];
        foreach ($userspost as $post) {
            foreach ($users as $user) {
                if ($post['userId'] === $user['id']) {
                    $post['user'] = $user;
                    $posts[] = $post;
                }
            }
        }
    $clear = $doctrine->getManager();
    $clear->getConnection()->query('TRUNCATE TABLE posts_users');
    foreach ($users as $user) {    
        foreach ($posts as $post) {
            if ($user['id'] === $post['userId']) {
                $UserPosts = new \App\Entity\PostsUsers();
                $UserPosts->setName($user['name']);
                $UserPosts->setTitle($post['title']);
                $UserPosts->setBody($post['body']);
                $clear->persist($UserPosts);
            }
        }
    }
        $clear->flush();
        return $this->redirect('/lista');
    }
}
