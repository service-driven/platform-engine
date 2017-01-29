<?php

namespace Simplicity\ReviewPlatform\Command;

use Interop\Container\ContainerInterface;
use Simplicity\ReviewPlatform\Container\ContainerAwareInterface;
use Simplicity\ReviewPlatform\Service\JiraService;
use Zend\Console\ColorInterface as Color;

/**
 * Class InitCommand
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\ReviewPlatform\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class InitCommand implements ContainerAwareInterface
{
    protected $container;

    function __invoke($route, $console)
    {
        $options = $route->getMatches();
        $jiraService = new JiraService();

        $console->writeLine('Fetch issue ' . $options['jiraIssueId'], Color::GREEN);

        $issue = $jiraService->findIssue($options['jiraIssueId']);

        var_dump($issue);
    }

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }
}