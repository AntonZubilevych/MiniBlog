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

    public function new()
    {
        $manager = $this->getDoctrine()->getManager();

        $model = new Page();
        $model->setPageName('Php7');
        $model->setTitle('PHP (англ. PHP: Hypertext Preprocessor — PHP:гіпертекстовий препроцесор');
        $model->setAboutContent('PHP (англ. PHP: Hypertext Preprocessor — PHP:
        гіпертекстовий препроцесор), попередня назва: Personal Home Page Tools — скриптова мова програмування,
        була створена для генерації HTML-сторінок на стороні веб-сервера. PHP є однією з найпоширеніших мов,
        що використовуються у сфері веб-розробок (разом із Java, .NET, Perl, Python, Ruby). PHP підтримується
        переважною більшістю хостинг-провайдерів. 
        PHP — проект відкритого програмного забезпечення..');
        $model->setAdditionalInfo(' (разом із Java, .NET, Perl, Python, Ruby). PHP підтримується
        переважною більшістю хостинг-провайдерів. 
        PHP — проект відкритого програмного забезпечення..\')');
        $model->setShowAdditionalInfo(false);
        $model->setUpdatedAt(new \DateTime());

        $manager->persist($model);
        $manager->flush();

        return new Response('Saved new product with id '.$model->getId());
    }
}
