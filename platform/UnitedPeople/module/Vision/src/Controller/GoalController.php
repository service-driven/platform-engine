<?php

namespace Vision\Controller;

use Vision\Entity\Goal;
use Vision\Service\GoalService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


/**
 * Class GoalController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Vision\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoalController extends AbstractActionController
{
    /** @var GoalService */
    protected $goalService;

    /**
     * GoalController constructor.
     * @param GoalService $goalService
     */
    public function __construct(GoalService $goalService)
    {
        $this->goalService = $goalService;
    }

    public function indexAction()
    {
        $data = [
            'header' => [
                'label' => 'Unsere gemeinsame Ziele',
            ],
            'content' => [
                Goal::SLUG => [
                    GoalService::ALL => [
                        'label' => 'Unsere <b>Ziele</b>',
                        'items' => $this->goalService->findAll(),
                    ],
                    GoalService::BY_PERIOD => [
                        'label' => 'Unsere <b>Ziele</b> für Q4 2016',
                        'items' => $this->goalService->findByPeriod(),
                    ],
                ],
            ],
        ];

        return new ViewModel($data);
    }

    public function createAction()
    {
        return new ViewModel();
    }

    public function showAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

}
