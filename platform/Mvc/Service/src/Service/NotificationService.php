<?php

namespace ServiceDriven\RestfulArchitecture\Service;

/**
 * Class NotificationPattern
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   ServiceDriven\RestfulArchitecture\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 * @see http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sns-2010-03-31.html
 *
 * @ORM\Table(name="indent")
 * @ORM\Entity(repositoryClass="Indent\Orm\Repository\IndentRepository")
 */
class NotificationService
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="indent_id_seq", allocationSize=1, initialValue=1)
     */
    protected $id;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="ServiceDriven\RestfulArchitecture\Orm\Entity\Topic", mappedBy="notificationService")
     */
    protected $topics;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="ServiceDriven\RestfulArchitecture\Orm\Entity\Application", mappedBy="notificationService")
     */
    protected $applications;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="ServiceDriven\RestfulArchitecture\Orm\Entity\Topic", mappedBy="notificationService")
     */
    protected $subscription;
}