<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\NotBlank;

use AppBundle\Service\RssFeedService;

class NewsController extends Controller
{
    const CATEGORY_ERROR = "Please choose category.";

    /**
     * @Route("/news/rss-feed-list", name="rss_feed_list")
     */
    public function rssFeedListAction()
    {
        $form = $this->createFormBuilder()->add('category', ChoiceType::class, array(
            'required' => TRUE, 'label' => 'Choose Category:', 
            'choices' => CategoryEnum::categories(),
            'multiple' => FALSE, 'expanded' => FALSE,
            'constraints' => array( new NotBlank() )))
          ->getForm();


        return $this->render('@App/news/list.html.twig', [
            'form' => $form->createView() ]
        );
    }

    /**
     * @Route("/", name="welcome")
     */
    public function welcomeAction() {
        return $this->redirect($this->generateUrl('rss_feed_list'));
    }
    
    
    
}
