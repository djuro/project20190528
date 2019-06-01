<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Service\RssFeedService;


class RssController extends Controller
{
    

    /**
     * @Route("/get-rss", options={"expose"=true}, name="get_rss")
     */
    public function getRssAction(Request $request, RssFeedService $rssFeedService)
    {
        if($request->isXmlHttpRequest()) {
            $categoryFeedUrl = $request->request->get('category_url');
            
            $simpleXml = $rssFeedService->getFeedXml($categoryFeedUrl);

            $articleSnippets = $rssFeedService->formatNewsArticleSnippets($simpleXml);
            
            $htmlListItems = $this->twigRenderListItems($articleSnippets);
            
            $response = new Response();
              $response->setContent(json_encode([
                'data' => $htmlListItems
            ]));
              
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }

        throw $this->createNotFoundException();
    }
    
    /**
     * 
     * @param ArticleSnippet[] $snippets
     * @return string[]
     */
    private function twigRenderListItems($snippets):array {
      $htmlListItems = array();
      
      foreach($snippets as $articleSnippet) {
          $htmlItem = $this->render('@App/news/list_item.html.twig', array(
              'url' => $articleSnippet->getUrl(),
              'title' => $articleSnippet->getTitle(),
              'description' => $articleSnippet->getDescription(),
              'date_published' => $articleSnippet->getDatePublished()
          ));
          
          $htmlListItems[] = $htmlItem->getContent();
      }
      return $htmlListItems;
    }

}
