<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\JsonResponse;

class RssController extends Controller
{
    

    /**
     * @Route("/get-rss", options={"expose"=true}, name="get_rss")
     */
    public function getRssAction(Request $request)
    {
        if($request->isXmlHttpRequest()) {
            return new JsonResponse(['data'=>'OK']);
        }

        throw $this->createNotFoundException();
    }

    
}
