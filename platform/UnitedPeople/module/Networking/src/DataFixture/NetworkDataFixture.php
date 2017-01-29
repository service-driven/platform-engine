<?php

namespace DataFixture;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Networking\Entity\Network;

/**
 * Class NetworkDataFixture
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   DataFixture
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class NetworkDataFixture implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $networkEntity = new Network();
        $networkEntity->setName('My network');
        $networkEntity->setDescription('Description');

        $manager->persist($networkEntity);
        $manager->flush();
    }
}
