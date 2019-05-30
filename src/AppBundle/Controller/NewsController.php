<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\NotBlank;


class NewsController extends Controller
{
    const CATEGORY_ERROR = "Please choose category.";

    /**
     * @Route("/news/categories", name="categories")
     */
    public function categoriesAction(Request $request)
    {
        $form = $this->createFormBuilder()->add('category', ChoiceType::class, array(
               'required' => TRUE, 'label' => 'Category:', 
               'choices' => CategoryEnum::categories(),
               'multiple' => FALSE, 'expanded' => FALSE,
               'constraints' => array( new NotBlank() )))
           ->getForm();


        return $this->render('@App/news/categories.html.twig', [
            'form' => $form->createView() ]
        );
    }

    private function formatCategoryChoices() {

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
