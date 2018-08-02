<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;



class HomeController extends AbstractController
{

    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Page::class);
        $pages = $repository->findAll();

        return $this->render('page/index.html.twig', [
            'pages' => $pages,
        ]);
    }

    public function page($pageName)
    {
        $repository = $this->getDoctrine()->getRepository(Page::class);
        $page = $repository->findOneBy(['page_name' => $pageName]);

        return $this->render('page/page.html.twig', [
            'page' => $page
        ]);
    }
}
