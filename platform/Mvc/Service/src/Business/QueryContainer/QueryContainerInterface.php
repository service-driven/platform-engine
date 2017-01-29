<?php

namespace Application\Business\QueryContainer;

/**
 * Interface QueryContainerInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Business\QueryContainer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface QueryContainerInterface
{
    public function getConnection();
}