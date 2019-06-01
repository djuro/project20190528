<?php

namespace AppBundle\Service;

use AppBundle\View\ArticleSnippet;

use \SimpleXmlElement;

/**
 * Fetches RSS feed XML and formats data transfer objects for further processing.
 */
class RssFeedService {

    
    
    /**
     * @param string $feedUrl
     * @return SimpleXmlElement
     */
    public function getFeedXml(string $feedUrl):SimpleXmlElement {

        $xml = file_get_contents($feedUrl);
        $simpleXml = new SimpleXmlElement($xml);
        return $simpleXml;
    }

    /**
     * 
     * @param SimpleXmlElement $simpleXml
     * @return ArticleSnippet[]
     */
    public function formatNewsArticleSnippets(SimpleXmlElement $simpleXml):array {
        
      $snippets = array();
      
      foreach($simpleXml->channel->item as $entry) {
        $snippet = new ArticleSnippet($entry->title, $entry->description, $entry->link);
        $snippet->setDatePublished($entry->pubDate);
        $snippets[] = $snippet;
      }
      
      return $snippets;
    }
    
}