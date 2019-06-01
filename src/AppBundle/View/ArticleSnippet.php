<?php

namespace AppBundle\View;

use \SimpleXMLElement;

/**
 * Data transfer object, used for handling of short text representations for each article.
 */
class ArticleSnippet {

    /**
    * @var SimpleXMLElement
    */
    private $title;

    /**
    * @var SimpleXMLElement
    */
    private $description;

    /**
    * @var SimpleXMLElement
    */
    private $url;

    /**
    * @var SimpleXMLElement
    */
    private $datePublished;

    /**
     * 
     * @param SimpleXMLElement $title
     * @param SimpleXMLElement $description
     * @param SimpleXMLElement $url
     */
    public function __construct(SimpleXMLElement $title, SimpleXMLElement $description, SimpleXMLElement $url) {
      $this->title = $title;
      $this->description = $description;
      $this->url = $url;
    }
    
    /**
     * 
     * @param SimpleXMLElement $datePublished
     * @return ArticleSnippet
     */
    public function setDatePublished(SimpleXMLElement $datePublished) {
        $this->datePublished = $datePublished;
        return $this;
    }

    /**
     * 
     * @return SimpleXMLElement
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * 
     * @return SimpleXMLElement
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * 
     * @return SimpleXMLElement
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * 
     * @return SimpleXMLElement
     */
    public function getDatePublished() {
        return $this->datePublished;
    }

}