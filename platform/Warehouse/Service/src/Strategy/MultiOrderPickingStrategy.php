<?php

namespace Warehouse\Strategy;

use Indent\Service\Data\IndentDataService;

/**
 * Class MultiOrderPickingStrategy
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Strategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class MultiOrderPickingStrategy implements PickingStrategyInterface
{
    /** @var IndentDataService */
    protected $indentDataService;

    /**
     * MultiOrderPickingStrategy constructor.
     *
     * @param IndentDataService $indentDataService
     */
    public function __construct(IndentDataService $indentDataService)
    {
        $this->indentDataService = $indentDataService;
    }

    public function pick()
    {
        $indents = $this->indentDataService->findByPriority(10);

        foreach ($indents as $indent) {
            foreach ($indent->getIndentProducts() as $indentProduct) {
                foreach ($indentProduct->getProduct()->getStorageAccounts() as $storageAccount) {
                    $storageLocation = $storageAccount->getStorageLocation();

                    $tray = $storageLocation->getTray();
                    $level = $storageLocation->getLevel();
                    $rack = $storageLocation->getRack();

                    var_dump($storageLocation);
                }
            }
        }
    }
}
