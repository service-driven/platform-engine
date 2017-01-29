<?php

namespace Data\Service\Review;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ConsumerAffairsService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Data\Service\Review
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ConsumerAffairsService
{
    /** @var string */
    protected $domain = 'https://www.consumeraffairs.com';

    public function fetchReviews($url)
    {
        $uri = implode('/', array($this->domain, 'review', $url));
        $html = file_get_contents($uri);
        $crawler = new Crawler($html);

        $reviews = $crawler->filter('#campaign-reviews > .review').each();

        return array();
    }
}
