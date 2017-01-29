<?php

namespace Indent\Business\Indent;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Indent\Business\IndentNotFoundException;
use Indent\DataTransfer\IndentTransfer;

/**
 * Class Indent
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Indent\Business\Indent
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Indent
{
    /** @var  EntityRepository */
    protected $dataService;

    protected $indentReferenceGenerator;

    protected $indentConfig;

    protected $mailFacade;

    protected $localeQueryContainer;

    protected $store;

    /**
     * Indent constructor.
     *
     * @param $dataService
     * @param $indentReferenceGenerator
     * @param $indentConfig
     * @param $mailFacade
     * @param $localeQueryContainer
     * @param $store
     */
    public function __construct(
        $dataService,
        $indentReferenceGenerator,
        $indentConfig,
        $mailFacade,
        $localeQueryContainer,
        $store
    ) {
        $this->dataService = $dataService;
        $this->indentReferenceGenerator = $indentReferenceGenerator;
        $this->indentConfig = $indentConfig;
        $this->mailFacade = $mailFacade;
        $this->localeQueryContainer = $localeQueryContainer;
        $this->store = $store;
    }

    public function hasTask($taskId)
    {
        /** @var ArrayCollection $indents */
        $indents = $this->findByTask($taskId);

        return $indents->count();
    }

    /**
     * @param $taskId
     *
     * @return array
     */
    public function findByTask($taskId)
    {
        return $this->dataService->findBy(['task' => $taskId]);
    }


    public function get(IndentTransfer $indentTransfer)
    {
        $indentEntity = $this->getIndent($indentTransfer);
    }

    private function getIndent(IndentTransfer $indentTransfer)
    {
        $indentEntity = $this->dataService->find($indentTransfer->getId());

        if (null !== $indentEntity) {

            return $indentEntity;
        }

        throw new IndentNotFoundException(sprintf('Indent not found by id `%s`', $indentTransfer->getId()));
    }

    protected function createIndentResponseTransfer($isSuccess = true)
    {
        $indentResponseTransfer = new IndentResponseTransfer();
        $indentResponseTransfer->setIsSuccess($isSuccess);

        return $indentResponseTransfer;
    }

    protected function createIndentErrorResponse()
    {
        $indentErrorTransfer = new IndentErrorTransfer();
        $indentErrorTransfer->setMessage(Messages::INDENT_ERROR);

        $indentResponseTransfer = $this->createIndentResponseTransfer(false);
        $indentResponseTransfer->addError($indentErrorTransfer);

        return $indentResponseTransfer;
    }
}