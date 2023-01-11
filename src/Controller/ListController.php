<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\PostsUsers;

class ListController extends AbstractController
{
    #[Route('/lista', name: 'app_list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        return $this->render('index.html.twig', array(
            'posts' => $doctrine->getRepository(PostsUsers::class)->findAll(),
        ));
    }

    #[Route('/lista/{id}/delete', name: 'app_delete')]
    public function delete($id, ManagerRegistry $doctrine): Response
    {
        $del = $doctrine->getManager();
        $post = $del->getRepository(PostsUsers::class)->find($id);
        $del->remove($post);
        $del->flush();
        return $this->redirectToRoute('app_list');
    }
}
