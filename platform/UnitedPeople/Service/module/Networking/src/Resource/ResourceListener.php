<?php

namespace Networking\Resource;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use DoctrineModule\Paginator\Adapter\Collection;
use DoctrineModule\Paginator\Adapter\Selectable;
use Zend\Paginator\Paginator;
use ZF\ApiProblem\ApiProblem;
use ZF\ContentNegotiation\Request;
use ZF\Rest\AbstractResourceListener;
use ZF\Rest\ResourceEvent;

/**
 * Class ResourceListener
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Resource
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ResourceListener extends AbstractResourceListener
{
    /** @var EntityManagerInterface */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $id
     * @return object
     */
    public function fetch($id)
    {
        $repository = $this->entityManager->getRepository($this->entityClass);

        return $repository->find($id);
    }


    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        /** @var EntityRepository $repository */
        $repository = $this->entityManager->getRepository($this->entityClass);

        $expression = Criteria::expr()->gt('sumtotal', 10);
        $criteria = new Criteria($expression);

        $adapter = new Selectable($repository, $criteria);
        /** @var ResourceEvent $event */
        $event = $this->getEvent();
        /** @var Request $request */
        $request = $event->getRequest();
        $page = $request->getQuery('page');

        $paginator = new Paginator($adapter);
        $paginator->setCurrentPageNumber($page)->setItemCountPerPage(10);




        $repository->matching($criteria);

        $entities = $repository->findBy([], [], 10, 0);
        $entityCollection = new ArrayCollection($entities);
        $paginator = new Paginator(new Collection($entityCollection));




        return $paginator;
    }
}
