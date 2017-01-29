<?php

namespace Indent\Business;

use Application\Business\AbstractFacade;
use Doctrine\ORM\EntityRepository;

/**
 * Class Facade
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Indent\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 *
 * @method IndentBusinessFactory getFactory()
 */
class IndentFacade extends AbstractFacade
{
    public function updateIndent(IndentTransfer $indentTransfer) : EntityRepository
    {
        return $this->getFactory()->createIndent()->update($indentTransfer);
    }
}