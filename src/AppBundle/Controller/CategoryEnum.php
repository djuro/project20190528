<?php

namespace AppBundle\Controller;

class CategoryEnum {

    private static $categories = array(
        'News' => 'https://www.independent.ie/rss',
        'Sport' => 'https://www.independent.ie/sport/rss',
        'Business' => 'https://www.independent.ie/business/rss',
        'Entertainment' => 'https://www.independent.ie/entertainment/rss'
    );

    /**
     * @return string[]
     */
    public static function categories() {
        return self::$categories;
    }
}