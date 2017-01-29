<?php

namespace Data\Service\Review;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Class TrustPilotService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Data\Service\Review
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class TrustPilotService
{
    /** @var string  */
    protected $developer = 'https://developers.trustpilot.com/';
    /** @var string  */
    protected $domain = 'https://www.trustpilot.com';

    /**
     * @return array
     */
    public function fetchReviews()
    {
        $sites = array(
            // https://www.trustpilot.com/search?query=europcar
            array(
                'url' => 'www.europcar.co.uk',
            ),
            array(
                'url' => 'www.europcar.de',
            ),
            array(
                'url' => 'www.europcar.ie',
            ),


            // compititors
            array(
                'url' => 'www.sixt.de',
                'rating' => 1.8,
            ),
            array(
                'url' => 'www.sixt.com',
                'rating' => 3.2,
            ),
            array(
                'url' => 'www.sixt.co.uk',
                'rating' => 1.3,
            ),
            array(
                'url' => 'www.enterprise.com',
                'rating' => 4.1,
            ),
            array(
                'url' => 'www.enterprise.co.uk',
                'rating' => 3.5,
            ),
            array(
                'url' => 'www.avis.co.uk',
                'rating' => 1.2,
            ),
            array(
                'url' => 'www.hertz.co.uk',
                'rating' => 0.9,
            ),

            // compititors (https://uk.trustpilot.com/categories/car_rental)
            array(
                'url' => 'www.indigocarhire.co.uk',
                'rating' => 9.8,
                'category' => 'car-rental',
            ),
            array(
                'url' => 'www.yourtravelgroup.co.uk',
                'rating' => 9.7,
            ),
            array(
                'url' => 'johngrose.co.uk',
                'rating' => 9.6,
            ),
            array(
                'url' => 'www.cabreramedina.com/en',
                'rating' => 9.5,
                'category' => 'car-rental',
            ),
            array(
                'url' => 'floridacarhire.com',
                'rating' => 9.5,
            ),
            array(
                'url' => 'premierevelocity.com',
                'rating' => 9.5,
                'category' => 'car-rental',
            ),
            array(
                'url' => 'www.yellohire.com',
                'rating' => 9.5,
                'category' => 'car-rental',
            ),
            array(
                'url' => 'www.holidayautos.com',
                'rating' => 9.4,
                'category' => 'car-rental',
            ),
            array(
                'url' => 'www.crystaltravel.co.uk',
                'rating' => 9.2,
            ),
            array(
                'url' => 'www.carrentals.co.uk',
                'rating' => 9.2,
                'category' => 'car-rental',
            ),
        );

        $reviews = array();
        foreach ($sites as $site) {
            $site['reviews'] = $this->fetchCompany($site['url']);

            $reviews[] = $site;
        }

        return $reviews;
    }

    /**
     * @param string $url
     *
     * @return array
     */
    public function fetchCompany($url)
    {
        $uri = implode('/', array($this->domain, 'review', $url));
        $html = file_get_contents($uri);
        $cacheFile = '../var/data/import/' . $url . '.json';

        if (is_file($cacheFile) && is_readable($cacheFile)) {
            $content = file_get_contents($cacheFile);

            return json_decode($content);
        }

        $crawler = new Crawler($html);
        $reviews = $crawler->filter('div.review.item')->each(function (Crawler $node, $i) {

            $classNames = $node->filter('.star-rating')->attr('class');
            $user = $node->filter('.user-info');
            $userLink = $user->filter('.user-review-name > .user-review-name-link');

            $review = array(
                'title' => $node->filter('.review-title-link')->text(),
                'body' => trim($node->filter('.review-body')->text()),
                'rating' => $classNames,
                'created' => $node->filter('.ndate')->attr('datetime'),
            );

            if ($i < 2) {
                $review['user'] = $this->fetchUser($userLink->attr('href'));
            }

            return $review;
        });

        $rating = $crawler->filter('.word-rating > .number-rating > .average')->text();
        $numberOfReviews = $crawler->filter('.stats-recency-wrapper > .stats > .ratingCount')->text();
        $companyInfoElement = $crawler->filter('.company-info');

        $company = array(
//            'description' => $companyInfoElement->filter('.business-html-description')->text(),
//            'href' => $companyInfoElement->filter('.visit-company-link-js')->attr('href'),
//            'contact' => $companyInfoElement->filter('.contact')->text(),
            'url' => $url,
            'rating' => $rating,
            'numberOfReviews' => $numberOfReviews,
            'reviews' => $reviews,
        );

        file_put_contents($cacheFile, json_encode($company));


        return $reviews;

    }

    /**
     * @param string $url
     *
     * @return array
     */
    public function fetchUser($url)
    {
        $html = file_get_contents($this->domain . $url);
        $cacheFile = '../var/data/import/' . $url . '.json';

        if (is_file($cacheFile) && is_readable($cacheFile)) {
            $content = file_get_contents($cacheFile);

            return json_decode($content);
        }

        $crawler = new Crawler($html);


        $reviews = $crawler->filter('div.review.item')->each(function (Crawler $node) {

            $classNames = $node->filter('.star-rating')->attr('class');
            $user = $node->filter('.user-info');
            $userLink = $user->filter('.user-review-name > .user-review-name-link');

            $review = array(
//                'title' => $node->filter('.review-title-link')->text(),
                'body' => trim($node->filter('.review-body')->text()),
                'author' => array(
//                    'name' => trim($userLink->text()),
//                    'link' => $userLink->attr('href'),
//                    'reviews' => trim($user->filter('.clearfix')->last()->text()),
                ),
                'rating' => $classNames,
                'created' => $node->filter('.ndate')->attr('datetime'),
            );

            return $review;
        });

        $user = array(
            'avatarUrl' => $crawler->filter('.user-summary-wrapper .user-image')->attr('src'),
            'headline' => $crawler->filter('.user-summary-wrapper .headline')->attr('src'),
            'gender' => $crawler->filter('.user-summary-wrapper .gender-location-wrapper .gender-js')->text(),
            'location' => $crawler->filter('.user-summary-wrapper .gender-location-wrapper .location-js')->text(),
//            'description' => $crawler->filter('.user-summary-wrapper .gender-location-wrapper .user-description')->text(),
            'reviews' => $reviews,
        );

        file_put_contents($cacheFile, json_encode($user));

        return $user;
    }
}
