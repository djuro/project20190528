<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends Controller
{
    /**
     * @Route("/admin/categories", name="categories")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/news/categories.html.twig', [
            'var1' => 'var 1']
        );
    }

    /**
     * @Route("/another", name="another")
     */
    public function anotherAction(Request $request)
    {
        
        return $this->render('@App/default/another.html.twig',
                array(
                    'var1'=>'Var 1'
                ));

    }
}
