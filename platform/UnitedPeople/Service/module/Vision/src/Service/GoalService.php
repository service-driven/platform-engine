<?php

namespace Vision\Service;

use Vision\Entity\Goal;
use Vision\DataService\GoalDataService;

/**
 * Class GoalService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Vision\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoalService
{
    const ALL = 'all';
    const BY_PERIOD = 'byPeriod';

    /** @var GoalDataService */
    protected $goalDataService;

    /**
     * GoalService constructor.
     * @param GoalDataService $goalDataService
     */
    public function __construct(GoalDataService $goalDataService)
    {
        $this->goalDataService = $goalDataService;
    }

    /**
     * @return Goal[]
     */
    public function findAll()
    {
        return [
            new Goal('Econda Recommendation Engine', 'Personalisierung'),
            new Goal('Logik der Sortierung im Sale-Bereich optimieren', 'OnPage Optimierung'),
            new Goal('Einkaufspreise in Online Marketing Feed integrieren', 'Online Marketing'),
            new Goal('Risk Solution Service (RSS)', 'Bestellprozess'),
        ];
    }

    /**
     * @return Goal[]
     */
    public function findByPeriod()
    {
        return [
            new Goal('Förderung von Existenzgründern', 'B2C'),
            new Goal('Beratung von Existenzgründern', 'B2C'),
            new Goal('Dienstleistungen für Unternehmen', 'B2C'),
            new Goal('Verwaltung von Gebäude- und Gründstücke', 'B2C'),
            new Goal('Beteiligungen', 'B2C'),
        ];
    }
}
