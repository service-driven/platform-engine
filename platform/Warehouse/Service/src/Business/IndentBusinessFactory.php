<?php

namespace Indent\Business;

use Application\Business\AbstractBusinessFactory;
use Indent\Business\Indent\Indent;

/**
 * Class IndentBusinessFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Indent\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class IndentBusinessFactory extends AbstractBusinessFactory
{


    public function createIndent()
    {
        $indent = new Indent();

        return $indent;
    }
}